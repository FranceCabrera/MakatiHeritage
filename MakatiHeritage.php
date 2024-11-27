<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makati Heritage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="logos/home.png" alt="Makati Heritage Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#"><img src="logos/home.png" alt="Home Icon"> Home</a></li>
                    <li><a href="#"><img src="logos/task.png" alt="Task Icon"> Task</a></li>
                    <li><a href="#"><img src="logos/location.png" alt="Explorer Icon"> Explorer</a></li>
                    <li><a href="#"><img src="logos/favorite.png" alt="Favorites Icon"> Favorites</a></li>
                    <li><a href="#"><img src="logos/account.png" alt="Account Icon"> Account</a></li>
                    <li><a href="#"><img src="logos/logout.png" alt="Logout Icon"> Log out</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <main>
            <header>
                <h1>Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Guest'); ?>!</h1>
                <p>Welcome back and explore the heritage</p>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <button>Search</button>
                </div>
            </header>

            <div class="slider">
                <h2>Top 10 Must-See Sites of the City!</h2>
                <div class="carousel">
                    <button>&lt;</button>
                    <div class="carousel-content">
                        <img src="images/site1.jpg" alt="Site 1">
                        <img src="images/site2.jpg" alt="Site 2">
                        <img src="images/site3.jpg" alt="Site 3">
                    </div>
                    <button>&gt;</button>
                </div>
            </div>

            <section class="walking-tours">
                <h2>Free Walking Tours</h2>
                <div class="tours">
                    <div>
                        <h3>Poblacion Heritage Sites</h3>
                        <p>Explore the old downtown of Makati and experience the city’s rich cultural heritage.</p>
                    </div>
                    <div>
                        <h3>The Garden Way of the Cross</h3>
                        <p>The Stations of the Cross feature sculptures of Philippine contemporary art.</p>
                    </div>
                    <div>
                        <h3>Poblacion Pub Crawl</h3>
                        <p>Discover places in Poblacion that offer relaxation and adventure.</p>
                    </div>
                </div>
            </section>

            <section class="brief-history">
                <img src="images/makati-skyline.jpg" alt="Makati Skyline">
                <h2>Brief History of Makati</h2>
                <p>
                    Makati was formerly known as San Pedro de Macati, reflecting the colorful heritage of the locality.
                    Founded in 1670, it has grown to become the financial and cultural hub of the Philippines.
                </p>
            </section>
        </main>
    </div>
</body>
</html>
