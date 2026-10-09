<!doctype html>
<html lang="en-AU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodCart Hot Dogs | Melbourne West</title>
    <meta name="description" content="American-style halal beef hot dogs in Melbourne's west. Order ahead and pick up from the cart.">
    <style>
        :root {
            --navy: #0b2b45;
            --red: #cf2f2a;
            --blue: #65bce7;
            --cream: #f5ecd8;
            --paper: #fffaf0;
            --ink: #102f49;
            --shadow: 0 18px 48px rgba(11,43,69,.18);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                linear-gradient(rgba(101,188,231,.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(101,188,231,.08) 1px, transparent 1px),
                var(--cream);
            background-size: 36px 36px;
        }
        a { color: inherit; }
        .shell { width: min(1180px, calc(100% - 32px)); margin: 0 auto; }

        .topline { height: 10px; background: var(--blue); border-bottom: 3px solid var(--red); }
        .topbar-wrap { background: var(--navy); color: white; border-bottom: 4px solid var(--blue); }
        .topbar { min-height: 86px; display: flex; align-items: center; justify-content: space-between; gap: 18px; }
        .brand { display: flex; align-items: center; gap: 14px; text-decoration: none; font-weight: 950; letter-spacing: .07em; }
        .brand img { width: 70px; height: 70px; object-fit: contain; background: var(--cream); border: 3px solid white; border-radius: 12px; }
        .status { font-size: .82rem; font-weight: 900; letter-spacing: .08em; padding: 10px 14px; border: 2px solid var(--blue); border-radius: 999px; color: white; }

        .banner { background: #102f49; border-bottom: 7px solid var(--red); overflow: hidden; }
        .banner img { width: 100%; display: block; max-height: 150px; object-fit: cover; object-position: center; }

        .flag-band { background: white; border-top: 7px solid var(--blue); border-bottom: 7px solid var(--blue); }
        .flag-inner { display: flex; align-items: center; justify-content: center; gap: 22px; min-height: 66px; }
        .stars { color: var(--red); font-size: clamp(1.6rem, 4vw, 2.7rem); letter-spacing: .2em; line-height: 1; }
        .flag-copy { font-weight: 950; letter-spacing: .14em; font-size: .78rem; text-transform: uppercase; color: var(--navy); }

        .hero { display: grid; grid-template-columns: .9fr 1.1fr; gap: 42px; align-items: center; padding: 46px 0 58px; }
        .hero-copy { background: rgba(255,250,240,.96); border: 4px solid var(--navy); box-shadow: 12px 12px 0 var(--blue); padding: clamp(24px,4vw,44px); position: relative; }
        .hero-copy::after { content: "CHICAGO STYLE"; position: absolute; top: -18px; left: 22px; background: var(--red); color: white; padding: 8px 13px; font-size: .72rem; font-weight: 950; letter-spacing: .14em; transform: rotate(-2deg); }
        h1 { margin: 0 0 18px; font-family: Rockwell, "Roboto Slab", Georgia, serif; text-transform: uppercase; font-size: clamp(3rem, 6.8vw, 6.2rem); line-height: .9; letter-spacing: -.045em; }
        .lead { margin: 0 0 26px; color: #3f5667; font-size: clamp(1rem, 1.8vw, 1.2rem); line-height: 1.55; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; min-height: 52px; padding: 0 22px; border: 3px solid var(--navy); text-decoration: none; font-weight: 950; letter-spacing: .04em; transition: transform .15s ease, box-shadow .15s ease; }
        .btn:hover { transform: translate(-2px,-2px); box-shadow: 5px 5px 0 var(--navy); }
        .btn-primary { background: var(--red); color: white; border-color: var(--red); }
        .btn-secondary { background: var(--paper); }

        .hero-visual { position: relative; min-height: 520px; }
        .hero-logo { width: min(310px, 62%); display: block; margin: 0 auto -20px; position: relative; z-index: 5; filter: drop-shadow(0 12px 18px rgba(0,0,0,.2)); }
        .dog-stack { position: relative; min-height: 380px; }
        .dog-card { position: absolute; width: 58%; background: white; border: 6px solid white; box-shadow: var(--shadow); }
        .dog-card img { width: 100%; display: block; aspect-ratio: 1/1; object-fit: cover; }
        .dog-card.american { left: 0; top: 32px; transform: rotate(-4deg); }
        .dog-card.chicago { right: 0; top: 74px; transform: rotate(4deg); }
        .dog-label { background: var(--navy); color: white; padding: 10px 13px; font-weight: 950; text-transform: uppercase; letter-spacing: .06em; display: flex; justify-content: space-between; gap: 10px; }
        .dog-label span:last-child { color: var(--cream); }

        .section { padding: 64px 0; }
        .section-title { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 24px; }
        .section-title h2 { font-family: Rockwell, Georgia, serif; font-size: clamp(2.4rem, 5vw, 4.7rem); line-height: .95; margin: 0; text-transform: uppercase; }
        .section-title p { max-width: 520px; margin: 0; color: #4f6576; line-height: 1.55; }

        .menu-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 22px; }
        .menu-card { background: var(--paper); border: 4px solid var(--navy); box-shadow: 9px 9px 0 var(--blue); overflow: hidden; }
        .menu-card img { width: 100%; display: block; aspect-ratio: 16/10; object-fit: cover; }
        .menu-copy { padding: 20px; border-top: 4px solid var(--red); }
        .menu-title { display: flex; justify-content: space-between; gap: 18px; align-items: baseline; }
        .menu-title h3 { margin: 0; font-family: Rockwell, Georgia, serif; text-transform: uppercase; font-size: 1.55rem; }
        .price { font-size: 1.7rem; font-weight: 1000; color: var(--red); }
        .menu-copy p { margin: 8px 0 0; line-height: 1.5; color: #506576; }

        .drinks { margin-top: 24px; display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); gap: 14px; }
        .drink { background: white; border: 3px solid var(--navy); box-shadow: 5px 5px 0 rgba(101,188,231,.8); overflow: hidden; }
        .drink img { width: 100%; display: block; aspect-ratio: 1/1; object-fit: cover; }
        .drink div { border-top: 3px solid var(--red); padding: 12px 13px; display: flex; justify-content: space-between; gap: 10px; font-weight: 900; }

        .pickup { background: var(--navy); color: white; border: 6px solid var(--blue); box-shadow: 10px 10px 0 var(--red); padding: clamp(24px,4vw,42px); display: grid; grid-template-columns: 1fr auto; gap: 26px; align-items: center; }
        .pickup h2 { font-family: Rockwell, Georgia, serif; text-transform: uppercase; font-size: clamp(2rem,4vw,3.8rem); margin: 0 0 10px; }
        .pickup p { margin: 0; max-width: 700px; color: #d8e7ef; line-height: 1.55; }

        footer { background: var(--navy); color: #d9e7ef; margin-top: 70px; }
        footer .shell { padding: 26px 0 34px; display: flex; justify-content: space-between; gap: 20px; flex-wrap: wrap; }

        @media (max-width: 850px) {
            .hero { grid-template-columns: 1fr; }
            .hero-visual { min-height: 480px; }
            .section-title { align-items: start; flex-direction: column; }
            .menu-grid { grid-template-columns: 1fr; }
            .drinks { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .pickup { grid-template-columns: 1fr; }
        }
        @media (max-width: 520px) {
            .shell { width: min(100% - 20px,1180px); }
            .brand span { display: none; }
            .brand img { width: 58px; height: 58px; }
            .status { font-size: .7rem; }
            .flag-copy { display: none; }
            .hero { padding-top: 34px; }
            .hero-copy { box-shadow: 7px 7px 0 var(--blue); }
            .hero-visual { min-height: 380px; }
            .dog-stack { min-height: 300px; }
            .dog-card { width: 64%; border-width: 4px; }
            .dog-label { font-size: .75rem; }
            .drinks { gap: 9px; }
            .drink div { font-size: .8rem; padding: 9px; }
        }
    </style>
</head>
<body>
    <div class="topline"></div>

    <div class="topbar-wrap">
        <header class="shell topbar">
            <a class="brand" href="/">
                <img src="{{ asset('DogAssets/heroLogo.png') }}" alt="FoodCart Hot Dogs logo">
                <span>FOODCART HOT DOGS</span>
            </a>
            <div class="status">MELBOURNE WEST · PICK-UP</div>
        </header>
    </div>

    <div class="banner">
        <img src="{{ asset('DogAssets/banner.png') }}" alt="FoodCart Hot Dogs banner">
    </div>

    <div class="flag-band">
        <div class="shell flag-inner">
            <div class="flag-copy">Chicago inspiration · Melbourne cart</div>
            <div class="stars" aria-label="four Chicago-style stars">✶ ✶ ✶ ✶</div>
            <div class="flag-copy">Halal beef · direct pick-up</div>
        </div>
    </div>

    <main>
        <section class="shell hero">
            <div class="hero-copy">
                <h1>Hot dogs. No giant queue.</h1>
                <p class="lead">American-style halal beef hot dogs with a little Chicago attitude. Order on your phone, wander over, and collect from the cart when it is ready.</p>
                <div class="actions">
                    <a class="btn btn-primary" href="/foodcart-hot-dogs/menus">ORDER PICK-UP</a>
                    <a class="btn btn-secondary" href="#menu">SEE THE MENU</a>
                </div>
            </div>

            <div class="hero-visual">
                <img class="hero-logo" src="{{ asset('DogAssets/heroLogo.png') }}" alt="FoodCart Hot Dogs">
                <div class="dog-stack">
                    <article class="dog-card american">
                        <img src="{{ asset('DogAssets/americandog.png') }}" alt="The American hot dog">
                        <div class="dog-label"><span>The American</span><span>$7</span></div>
                    </article>
                    <article class="dog-card chicago">
                        <img src="{{ asset('DogAssets/the chicago.png') }}" alt="The Chicago hot dog">
                        <div class="dog-label"><span>The Chicago</span><span>$9</span></div>
                    </article>
                </div>
            </div>
        </section>

        <div class="flag-band">
            <div class="shell flag-inner"><div class="stars">✶ ✶ ✶ ✶</div></div>
        </div>

        <section class="shell section" id="menu">
            <div class="section-title">
                <h2>Two dogs.<br>Cold drinks.</h2>
                <p>Simple cart food, visible prices, fast pickup. The storefront stays deliberately small so nobody has to fight through a giant takeaway menu.</p>
            </div>

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
                        <p>Yellow mustard, green relish, onion, tomato wedges, dill pickle spear, pepperoncini and celery salt. No ketchup.</p>
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
                    <h2>Order now. Pick up at the cart.</h2>
                    <p>Collection only for the prototype. Order ahead on your phone, then use the normal TastyIgniter checkout and cart flow behind this custom storefront.</p>
                </div>
                <a class="btn btn-primary" href="/foodcart-hot-dogs/menus">START ORDER</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="shell">
            <span>FoodCart Hot Dogs · Melbourne's west</span>
            <span>Direct ordering · pickup first</span>
        </div>
    </footer>
</body>
</html>
