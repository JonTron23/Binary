<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#home">About</a></li>
                <li><a href="#home">Games</a></li>
                <li><a href="#home">News</a></li>
                <li><a href="#home">Media</a></li>
                <li><a href="#home">Partner</a></li>
                <li><a href="#home">Q&A</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">

        </section>
        <section id="about">

        </section>
        <section id="games">
            <div id="game_card">
                
            </div>


        </section>

        <section id="news">
            <div id="news_element">
                <div class="title">
                    <h1>test</h1>
                </div>
                <div id="news_image">
                    <img src="" alt="">
                </div>
                <div id="news_text">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
            </div>




        </section>

        <section id="media">
            <div id="twitter">
                <a class="twitter-timeline" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div id="instagram" class="bg-red-200">
                <h1>instagram</h1>
            </div>
            <div id="youtube" class="bg-green-200">
                <iframe width="420" height="315"
                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>
            </div>
            
            <div id="twitch-embed" class="bg-blue-200"></div>
            <script src="https://embed.twitch.tv/embed/v1.js"></script>

            <script type="text/javascript">
                new Twitch.Embed("twitch-embed", {
                    width: 854,
                    height: 480,
                    channel: "monstercat",
                    // Only needed if this page is going to be embedded on other websites
                    parent: ["embed.example.com", "othersite.example.com"]
                });
            </script>
        
        
        
        </section>

        <section id="partner">
            <h1>COMMING SOON!</h1>
        </section>
        <section id="qa">

        </section>
    </main>
    <footer>
    <p>Copyright</p>
    <i class="fa-solid fa-copyright"></i>
    <a href="">Impressum</a>
        <div class="socialIcons flex justify-end">
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-twitch"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>

    </footer>
</body>
</html>