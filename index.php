
<?php
include('db-connector.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="files/js/preloader.js"></script>
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body class="preloader-site">
    <script>
        $(window).on('load', function() {
            $('.preloader_wrapper').delay(2000).fadeOut(1000);
            $('body').removeClass('preloader-site');
        })
    </script>
    <div class="preloader_wrapper">
        <div class="preloader">
            <img src="files/media/fsp.gif" alt="">
        </div>
    </div>


    <header>
        <nav>
            <ul class="grid grid-cols-8 px-4">
                <li><a href="#home">Home</a></li>
                <li><a href="#home">About</a></li>
                <li><a href="#home">Games</a></li>
                <li><a href="#home">News</a></li>
                <li><a href="#home">Media</a></li>
                <li><a href="#home">Partner</a></li>
                <li><a href="#home">Q&A</a></li>
                <li class="cursor-pointer" id="myBtn"><i class="fa-solid fa-arrow-right-to-bracket"></i></li>
            </ul>
        </nav>
    </header>
    <a href="account.php"><i class="fa-solid fa-user"></i></a>
    <main>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content bg-black flex">
        <form class="flex flex-col w-1/2 justify-center pl-6" action="login.php" method="post">
        
        <div class="login_input_box flex flex-col mb-8">
            <input class="login_input z-10" type="email" name="email" required>
            <label class="login_label pb-2 z-0" for="email">E-Mail</label>
        </div>
        <div class="login_input_box flex flex-col mb-4">
            <input class="login_input z-10" type="password" name="password" required>
            <label class="login_label pb-2 z-0" for="password">Password</label>
        </div>
        <input type="submit" value="Submit" id="submit">
        <div class="flex justify-between">
            <a href="change_pw.php">Change Password</a>
            <a id="" href="register.php">Sign Up</a>
        </div>
            

        </form>
        <div class="login_logo w-1/2 h-80 flex justify-center items-center">
            <img class="logo w-60" src="files/media/Logo_Design/Logo_Design_White.png" alt="logo">
        </div>
        <span class="h-1/2 close">&times;</span>
    </div>

    </div>


        <section id="welcome">
            <h1 class="title">Welcome to Binary Gaming</h1>
            <img class="logo" src="files/media/Logo_Design/Logo_Design_White.png" alt="logo">
            <div id="start">
                <h2 class="text-4xl">Scroll Down</h2>
                <a href="#home"><i class="fa-solid fa-arrow-down"></i></a>
            </div>
        </section>

        <section id="about">
            <div id="timeline">
                <ul class="timeline_list">
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                          
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                            
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                           
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                        
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                           
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                          
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                         
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                         
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                         
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                         
                        </div>
                    </li>
                    <li>
                        <div class="timeline_element">
                            <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>                         
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <section id="games">
            <div id="game_card">
                <h2>Rainbow Six Siege</h2>
                <a href="teams.php"><img src="files/media/rainbow.jpg" alt=""></a>
            </div>
            <div id="game_card">
                <h2>League of Legends</h2>
                <a href="teams.php"><img src="files/media/lol.jpg" alt=""></a>
            </div>
            <div id="game_card">
                <h2>CSGO</h2>
                <a href="teams.php"><img src="files/media/csgo.jpg" alt=""></a>
            </div>
        </section>

        <section id="news" class="flex flex-col justify-around">
            <div class="news_slider"> 
            <div class="news_element">
                <div class="news_text">
                    <h1 class="news_title">Test</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. 
                    </p>
                </div>
            </div>

            <div class="news_element" class="">
                <div class="news_text">
                    <h1 class="news_title">Test</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. 
                    </p>
                </div>
            </div>

            <div class="news_element" class="">
                <div class="news_text">
                    <h1 class="news_title">Test</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. 
                    </p>
                </div>
            </div>


            </div>

        </section>

        <section id="media" class="flex justify-around">
            
            <div id="twitter">
                <h1 class="mb-12">Twitter</h1>
                <a class="twitter-timeline" href="https://twitter.com/BYGesports" data-tweet-limit="2" data-width="399" ></a>
                <script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="ty">
                <h1 class="mb-12">Youtube</h1>
                <div id="youtube" class="mb-32">
                    <iframe class="w-full" width="600" height="340" src="https://www.youtube.com/embed?max-results=1&controls=0&showinfo=0&rel=0&listType=user_uploads&list=bygesports" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <h1 class="mb-12">Twitch</h1>
                <div id="twitch-embed" class="bg-blue-200"></div>
                <script src="https://embed.twitch.tv/embed/v1.js"></script>

                <script type="text/javascript">
                    new Twitch.Embed("twitch-embed", {
                        width: 854,
                        height: 480,
                        channel: "bygesports",
                        // Only needed if this page is going to be embedded on other websites
                        parent: ["google.com", "google.com"]
                    });
            </script>
            </div>

        
        
        
        </section>

        <section id="partner">
            <h1>COMMING SOON!</h1>
        </section>
        <section id="qa" class="flex justify-center">
            <ul id="faq_list" class="w-5/12 flex flex-col items-center">
                <li class="faq_element">
                    <div class="faq_header">
                        <div class="question">
                        <h2>question</h2>
                        </div>
                        
                            <i class="fa-solid fa-plus"></i>
                     
                    </div>
                    <div class="faq_footer inactive">
                        <div class="answer">
                            <p>answer asdkfja asdfasdf asdfklasjdfö asdfjasdlf asdfs dfsdf df d dlöfs</p>
                        </div>
                    </div>
                </li>
                <li class="faq_element">
                    <div class="faq_header">
                        <div class="question">
                        <h2>question</h2>
                        </div>
                        <div class="accordion">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="faq_footer inactive">
                        <div class="answer">
                            <p>answer asdkfja asdfasdf asdfklasjdfö asdfjasdlf asdfs dfsdf df d dlöfs</p>
                        </div>
                    </div>
                </li>
                <li class="faq_element">
                    <div class="faq_header">
                        <div class="question">
                        <h2>question</h2>
                        </div>
                        <div class="accordion">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="faq_footer inactive">
                        <div class="answer">
                            <p>answer asdkfja asdfasdf asdfklasjdfö asdfjasdlf asdfs dfsdf df d dlöfs</p>
                        </div>
                    </div>
                </li>
                <li class="faq_element">
                    <div class="faq_header">
                        <div class="question">
                        <h2>question</h2>
                        </div>
                        <div class="accordion">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="faq_footer inactive">
                        <div class="answer">
                            <p>answer asdkfja asdfasdf asdfklasjdfö asdfjasdlf asdfs dfsdf df d dlöfs</p>
                        </div>
                    </div>
                </li>
                <li class="faq_element">
                    <div class="faq_header">
                        <div class="question">
                        <h2>question</h2>
                        </div>
                        <div class="accordion">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="faq_footer inactive">
                        <div class="answer">
                            <p>answer asdkfja asdfasdf asdfklasjdfö asdfjasdlf asdfs dfsdf df d dlöfs</p>
                        </div>
                    </div>
                </li>
            </ul>


            <form action="send_email.php" method="post" class="flex flex-col w-5/12">

<div class="contact_input_box">
    <label class="contact_label" for="name">Name</label>
    <input class="contact_input" type="text" name="name" required>
</div>

    <div class="contact_input_box">
        <label class="contact_label" for="email">E-Mail</label>
        <input class="contact_input" type="email" name="email" required>
    </div>
    
    <div class="contact_input_box">
        <label class="contact_label" for="reference">Reference</label>
        <input class="contact_input" type="text" name="reference" required>
    </div>
    
    <div class="contact_input_box">
        <label class="contact__label textarea_label" for="message">Message</label>
        <textarea class="contact_input" name="msg" id="msg" cols="30" rows="10" required></textarea>    
    </div>

    
        <input class="submit" type="submit">
</form>
        </section>
        <section id="contact" class="flex justify-center">

        </section>
    </main>
    <footer class="flex">
    <i class="fa-solid fa-copyright"></i>
    <a href="impressum.php">Impressum</a>
        <div class="socialIcons ">
            <a href="" class="p-2"><i class="fa-brands fa-youtube"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-twitter"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-twitch"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <a href="register.php" class="">REGISTER</a>
    </footer>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }



        //open faq
        $('.faq_element').click(function() {
            $('.faq_element>.faq_footer.active').toggleClass('active inactive');
            $(this).children('.faq_footer').toggleClass('inactive active');
            $(this).children('.fa_solid').toggleClass('fa-plus fa-minus');  
        })




        //timeline
        var items = document.querySelectorAll(".timeline_list li");
        console.log(items);
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <=
                    (window.innerheight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerwidth || document.documentElement.clientWidth)
            );
        }
        function callbackFunc() {
            for (var i = 0; i < items.length; i++) {
            if (isElementInViewport(items[i])) {
                items[i].classList.add("in-view");
            }
            }
        }
        window.addEventListener("load", callbackFunc);
        window.addEventListener("resize", callbackFunc);
        window.addEventListener("scroll", callbackFunc);
    </script>

































































</body>
</html>