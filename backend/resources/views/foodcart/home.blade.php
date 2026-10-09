<!doctype html>
<html lang="en-AU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodCart Hot Dogs | Melbourne West</title>
    <meta name="description" content="American-style halal beef hot dogs in Melbourne's west. Order ahead and pick up from the cart.">
    <style>
        :root {
            --ink: #102f49;
            --red: #c92d24;
            --cream: #f3ead6;
            --paper: #fffaf0;
            --gold: #d59b2b;
            --shadow: 0 18px 50px rgba(16,47,73,.16);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 15% 10%, rgba(213,155,43,.12), transparent 27rem),
                linear-gradient(180deg, #fbf5e9 0%, #fffdf7 54%, #f4ead7 100%);
        }
        a { color: inherit; }
        .shell { width: min(1180px, calc(100% - 32px)); margin: 0 auto; }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
            gap: 16px;
        }
        .brand { display: flex; align-items: center; gap: 12px; text-decoration: none; font-weight: 900; letter-spacing: .04em; }
        .brand img { width: 72px; height: 72px; border-radius: 16px; object-fit: cover; box-shadow: var(--shadow); }
        .status { font-size: .92rem; font-weight: 800; padding: 9px 13px; border: 2px solid var(--ink); border-radius: 999px; background: rgba(255,255,255,.7); }
        .hero {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 54px;
            padding: 42px 0 72px;
        }
        .eyebrow { color: var(--red); font-weight: 900; letter-spacing: .13em; text-transform: uppercase; font-size: .8rem; }
        h1 { font-size: clamp(3.2rem, 7vw, 6.9rem); line-height: .9; letter-spacing: -.065em; margin: 14px 0 20px; max-width: 8ch; }
        .lead { font-size: clamp(1.05rem, 2vw, 1.3rem); line-height: 1.55; max-width: 610px; margin: 0 0 28px; color: #3c5263; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; min-height: 54px; padding: 0 24px; border-radius: 12px; text-decoration: none; font-weight: 900; border: 2px solid var(--ink); transition: transform .15s ease, box-shadow .15s ease; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 0 rgba(16,47,73,.14); }
        .btn-primary { color: white; background: var(--red); border-color: var(--red); }
        .btn-secondary { background: transparent; }
        .hero-art { position: relative; min-height: 500px; }
        .hero-art .logo { position: absolute; z-index: 3; width: 44%; left: 27%; top: 0; filter: drop-shadow(0 14px 24px rgba(0,0,0,.16)); }
        .hero-card { position: absolute; width: 58%; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); border: 5px solid var(--paper); background: white; }
        .hero-card img { width: 100%; display: block; aspect-ratio: 1/1; object-fit: cover; }
        .hero-card.american { left: 0; bottom: 0; transform: rotate(-5deg); }
        .hero-card.chicago { right: 0; bottom: 22px; transform: rotate(5deg); }
        .stripe { height: 9px; background: repeating-linear-gradient(90deg, var(--red) 0 70px, var(--cream) 70px 92px, var(--ink) 92px 162px, var(--cream) 162px 184px); }
        .section { padding: 72px 0; }
        .section h2 { font-size: clamp(2rem, 4vw, 3.7rem); letter-spacing: -.045em; margin: 0 0 10px; }
        .section-intro { color: #566a79; margin: 0 0 30px; font-size: 1.05rem; }
        .menu-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; }
        .menu-card { background: rgba(255,255,255,.84); border: 1px solid rgba(16,47,73,.12); border-radius: 22px; overflow: hidden; box-shadow: var(--shadow); }
        .menu-card img { width: 100%; aspect-ratio: 16/10; object-fit: cover; display: block; }
        .menu-copy { padding: 22px; }
        .menu-title { display: flex; justify-content: space-between; gap: 12px; align-items: baseline; }
        .menu-title h3 { font-size: 1.65rem; margin: 0; }
        .price { font-size: 1.55rem; font-weight: 1000; color: var(--red); }
        .menu-copy p { color: #5c6e7b; line-height: 1.5; margin: 10px 0 0; }
        .drinks { display: grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: 16px; margin-top: 22px; }
        .drink { background: #fff; border-radius: 18px; overflow: hidden; border: 1px solid rgba(16,47,73,.12); box-shadow: 0 10px 30px rgba(16,47,73,.08); }
        .drink img { width: 100%; display: block; aspect-ratio: 1/1; object-fit: cover; }
        .drink div { padding: 14px 16px 17px; font-weight: 850; display: flex; justify-content: space-between; gap: 8px; }
        .pickup { background: var(--ink); color: white; border-radius: 28px; padding: 36px; display: grid; grid-template-columns: 1fr auto; gap: 24px; align-items: center; }
        .pickup h2 { color: white; margin-bottom: 8px; }
        .pickup p { color: #d4e0e8; margin: 0; line-height: 1.55; }
        footer { padding: 34px 0 50px; color: #667783; font-size: .9rem; }
        @media (max-width: 820px) {
            .hero { grid-template-columns: 1fr; gap: 28px; padding-top: 18px; }
            .hero-art { min-height: 390px; }
            .menu-grid { grid-template-columns: 1fr; }
            .drinks { grid-template-columns: repeat(2, minmax(0,1fr)); }
            .pickup { grid-template-columns: 1fr; }
        }
        @media (max-width: 520px) {
            .shell { width: min(100% - 20px, 1180px); }
            .brand span { display: none; }
            .brand img { width: 58px; height: 58px; }
            .status { font-size: .8rem; }
            h1 { font-size: clamp(3rem, 18vw, 5rem); }
            .hero-art { min-height: 320px; }
            .hero-card { width: 62%; }
            .hero-art .logo { width: 46%; left: 27%; }
            .drinks { grid-template-columns: 1fr 1fr; gap: 10px; }
            .drink div { font-size: .82rem; padding: 10px; }
        }
    </style>
</head>
<body>
    <header class="shell topbar">
        <a class="brand" href="/">
            <img src="{{ asset('DogAssets/heroLogo.png') }}" alt="FoodCart Hot Dogs logo">
            <span>FOODCART HOT DOGS</span>
        </a>
        <div class="status">WERRIBEE · PICK-UP</div>
    </header>

    <div class="stripe"></div>

    <main>
        <section class="shell hero">
            <div>
                <div class="eyebrow">American hot dogs · Melbourne west</div>
                <h1>Good dogs. No giant queue.</h1>
                <p class="lead">Halal beef hot dogs, cold drinks and simple order-ahead pickup. Order on your phone, wander over, then collect from the cart when it is ready.</p>
                <div class="actions">
                    <a class="btn btn-primary" href="/foodcart-hot-dogs/menus">ORDER PICK-UP</a>
                    <a class="btn btn-secondary" href="#menu">SEE THE MENU</a>
                </div>
            </div>

            <div class="hero-art" aria-label="The American and The Chicago hot dogs">
                <img class="logo" src="{{ asset('DogAssets/heroLogo.png') }}" alt="">
                <div class="hero-card american"><img src="{{ asset('DogAssets/americandog.png') }}" alt="The American hot dog"></div>
                <div class="hero-card chicago"><img src="{{ asset('DogAssets/the chicago.png') }}" alt="The Chicago hot dog"></div>
            </div>
        </section>

        <div class="stripe"></div>

        <section class="shell section" id="menu">
            <div class="eyebrow">Two dogs. Keep it simple.</div>
            <h2>The menu</h2>
            <p class="section-intro">Cheap enough to be an easy lunch, interesting enough to be worth crossing the market for.</p>

            <div class="menu-grid">
                <article class="menu-card">
                    <img src="{{ asset('DogAssets/americandog.png') }}" alt="The American">
                    <div class="menu-copy">
                        <div class="menu-title"><h3>The American</h3><span class="price">$7</span></div>
                        <p>Halal beef frank, soft bun, yellow mustard, ketchup and onion.</p>
                    </div>
                </article>

                <article class="menu-card">
                    <img src="{{ asset('DogAssets/the chicago.png') }}" alt="The Chicago">
                    <div class="menu-copy">
                        <div class="menu-title"><h3>The Chicago</h3><span class="price">$9</span></div>
                        <p>Mustard, green relish, onion, tomato wedges, dill pickle spear, pepperoncini and celery salt. No ketchup.</p>
                    </div>
                </article>
            </div>

            <div class="drinks">
                <article class="drink"><img src="{{ asset('DogAssets/water.png') }}" alt="Water"><div><span>Water</span><span>$2</span></div></article>
                <article class="drink"><img src="{{ asset('DogAssets/coke.png') }}" alt="Soft drink can"><div><span>Can</span><span>$2.50</span></div></article>
                <article class="drink"><img src="{{ asset('DogAssets/sarsparila.png') }}" alt="Sarsaparilla"><div><span>Sarsaparilla</span><span>$3.50</span></div></article>
                <article class="drink"><img src="{{ asset('DogAssets/limesoda.png') }}" alt="Lime soda"><div><span>Lime Soda</span><span>$3.50</span></div></article>
            </div>
        </section>

        <section class="shell section">
            <div class="pickup">
                <div>
                    <div class="eyebrow" style="color:#efbd56">Skip the line</div>
                    <h2>Order now. Pick up at the cart.</h2>
                    <p>Current prototype is collection-only. The ordering system handles the cart and checkout; this page just gets you there without making you hunt through restaurant-demo screens.</p>
                </div>
                <a class="btn btn-primary" href="/foodcart-hot-dogs/menus">START ORDER</a>
            </div>
        </section>
    </main>

    <footer class="shell">FoodCart Hot Dogs · Melbourne's west · Prototype direct-ordering storefront</footer>
</body>
</html>
