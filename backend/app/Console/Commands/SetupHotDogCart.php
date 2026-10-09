<?php

namespace App\Console\Commands;

use Igniter\Cart\Models\Category;
use Igniter\Cart\Models\Menu;
use Igniter\Local\Models\Location;
use Igniter\Local\Models\LocationSettings;
use Igniter\System\Models\Country;
use Igniter\System\Models\Currency;
use Igniter\System\Models\Settings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SetupHotDogCart extends Command
{
    protected $signature = 'foodcart:hotdog {--force : Replace the demo menu with the FoodCart hot dog prototype}';

    protected $description = 'Localise FoodCart for Melbourne and install the halal hot dog cart demo menu';

    public function handle(): int
    {
        if (!$this->option('force') && !$this->confirm('Replace the current demo menu/categories with the FoodCart hot dog prototype?')) {
            $this->info('No changes made.');
            return self::SUCCESS;
        }

        $this->info('Setting Melbourne/Australia defaults...');

        Settings::set([
            'site_name' => 'FoodCart Hot Dogs',
            'timezone' => 'Australia/Melbourne',
            'distance_unit' => 'km',
            'guest_order' => 1,
        ]);

        $aud = Currency::query()->where('currency_code', 'AUD')->first();
        if ($aud) {
            $aud->currency_status = 1;
            $aud->currency_rate = 1;
            $aud->save();
            $aud->makeDefault();
        }

        $australia = Country::query()->where('iso_code_2', 'AU')->first();
        $location = Location::getDefault() ?: Location::query()->first() ?: new Location;

        $location->fill([
            'location_name' => 'FoodCart Hot Dogs — Werribee Pop-Up',
            'location_email' => $location->location_email ?: 'orders@foodcart.test',
            'location_address_1' => 'Mobile pop-up cart',
            'location_address_2' => 'Check today’s event location before collecting',
            'location_city' => 'Werribee',
            'location_state' => 'VIC',
            'location_postcode' => '3030',
            'location_country_id' => $australia?->country_id,
            'location_lat' => -37.9000,
            'location_lng' => 144.6600,
            'location_status' => 1,
            'permalink_slug' => 'foodcart-hot-dogs',
            'is_default' => 1,
            'is_auto_lat_lng' => 0,
            'description' => '<p>American-style halal beef hot dogs in Melbourne’s west. Order ahead, wander over when it is ready, and collect from the cart.</p>',
        ]);
        $location->save();
        $location->makeDefault();

        LocationSettings::instance($location, 'collection')->fill([
            'is_enabled' => 1,
            'add_lead_time' => 0,
            'time_interval' => 5,
            'lead_time' => 10,
            'time_restriction' => 1,
            'cancellation_timeout' => 0,
            'min_order_amount' => 0,
            'future_orders' => ['is_enabled' => false, 'min_days' => 0, 'days' => 0],
        ])->save();

        LocationSettings::instance($location, 'delivery')->fill([
            'is_enabled' => 0,
        ])->save();

        LocationSettings::instance($location, 'checkout')->fill([
            'guest_order' => 1,
            'limit_orders' => 0,
        ])->save();

        LocationSettings::instance($location, 'booking')->fill([
            'is_enabled' => 0,
        ])->save();

        $this->info('Replacing demo menu...');

        DB::transaction(function() use ($location): void {
            Menu::query()->get()->each(fn(Menu $menu) => $menu->delete());
            Category::query()->get()->each(fn(Category $category) => $category->delete());

            $hotDogs = Category::query()->create([
                'name' => 'Hot Dogs',
                'permalink_slug' => 'hot-dogs',
                'description' => 'Simple American-style halal beef hot dogs.',
                'priority' => 1,
                'status' => 1,
            ]);
            $hotDogs->locations()->sync([$location->getKey()]);

            $drinks = Category::query()->create([
                'name' => 'Drinks',
                'permalink_slug' => 'drinks',
                'description' => 'Cold drinks kept deliberately affordable.',
                'priority' => 2,
                'status' => 1,
            ]);
            $drinks->locations()->sync([$location->getKey()]);

            $items = [
                [
                    'category' => $hotDogs,
                    'name' => 'The American',
                    'description' => 'Halal beef frank, soft bun, yellow mustard, ketchup and onion.',
                    'price' => 7.00,
                    'image' => 'americandog.png',
                ],
                [
                    'category' => $hotDogs,
                    'name' => 'The Chicago',
                    'description' => 'Halal beef frank, yellow mustard, green relish, onion, tomato wedges, dill pickle spear, pepperoncini and celery salt. No ketchup — Chicago has rules.',
                    'price' => 9.00,
                    'image' => 'the chicago.png',
                ],
                [
                    'category' => $drinks,
                    'name' => 'Water',
                    'description' => 'Cold bottled water.',
                    'price' => 2.00,
                    'image' => 'water.png',
                ],
                [
                    'category' => $drinks,
                    'name' => 'Can',
                    'description' => 'Coke, Coke Zero, Solo, Fanta or Sprite — subject to stock.',
                    'price' => 2.50,
                    'image' => 'coke.png',
                ],
                [
                    'category' => $drinks,
                    'name' => 'Sarsaparilla',
                    'description' => 'Classic fizzy sarsaparilla.',
                    'price' => 3.50,
                    'image' => 'sarsparila.png',
                ],
                [
                    'category' => $drinks,
                    'name' => 'Lime Soda',
                    'description' => 'Crisp lime soda — a good match for a Chicago dog.',
                    'price' => 3.50,
                    'image' => 'limesoda.png',
                ],
            ];

            foreach ($items as $priority => $item) {
                $menu = Menu::query()->create([
                    'menu_name' => $item['name'],
                    'menu_description' => $item['description'],
                    'menu_price' => $item['price'],
                    'minimum_qty' => 1,
                    'menu_status' => 1,
                    'menu_priority' => $priority + 1,
                    'order_restriction' => ['collection'],
                ]);

                $menu->addMenuCategories([$item['category']->getKey()]);
                $menu->locations()->sync([$location->getKey()]);
                $this->attachImage($menu, $item['image'], 'thumb');
            }
        });

        $this->attachImage($location, 'heroLogo.png', 'thumb');
        $this->attachImage($location, 'banner.png', 'gallery');

        $this->newLine();
        $this->info('FoodCart hot dog prototype installed.');
        $this->line('Melbourne timezone • AUD • kilometres • pickup only');
        $this->line('Menu: The American $7 • The Chicago $9 • drinks $2–$3.50');
        $this->line('Open: '.config('app.url'));

        return self::SUCCESS;
    }

    private function attachImage($model, string $filename, string $tag): void
    {
        $path = public_path('DogAssets/'.$filename);
        if (!File::exists($path)) {
            $this->warn('Missing image: '.$path);
            return;
        }

        $uploadPath = $this->makeCleanImageCopy($path);

        try {
            $model->clearMediaTag($tag);
            $model->newMediaInstance()->addFromFile($uploadPath, $tag);
        } finally {
            if ($uploadPath !== $path && File::exists($uploadPath)) {
                File::delete($uploadPath);
            }
        }
    }

    /**
     * TastyIgniter deliberately scans raw image bytes for PHP/Apache payloads.
     * Generated PNGs can trip that scanner because of embedded metadata or text
     * chunks, so re-encode them to a clean raster image before attaching them.
     */
    private function makeCleanImageCopy(string $path): string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if (!in_array($extension, ['png', 'jpg', 'jpeg', 'webp'], true)) {
            return $path;
        }

        $tempDir = storage_path('app/foodcart-clean');
        File::ensureDirectoryExists($tempDir);
        $tempPath = $tempDir.'/'.uniqid('asset_', true).'.'.$extension;

        if (class_exists(\Imagick::class)) {
            try {
                $image = new \Imagick($path);
                $image->stripImage();
                $image->setImageFormat($extension === 'jpg' ? 'jpeg' : $extension);
                $image->writeImage($tempPath);
                $image->clear();
                $image->destroy();

                return $tempPath;
            } catch (\Throwable $e) {
                if (File::exists($tempPath)) {
                    File::delete($tempPath);
                }
            }
        }

        if (function_exists('imagecreatefromstring')) {
            $image = @imagecreatefromstring(File::get($path));
            if ($image !== false) {
                $written = match ($extension) {
                    'png' => imagepng($image, $tempPath, 9),
                    'jpg', 'jpeg' => imagejpeg($image, $tempPath, 95),
                    'webp' => function_exists('imagewebp') ? imagewebp($image, $tempPath, 95) : false,
                    default => false,
                };

                imagedestroy($image);

                if ($written && File::exists($tempPath)) {
                    return $tempPath;
                }
            }
        }

        $this->warn('Could not re-encode '.$path.'; trying original image.');
        return $path;
    }
}
