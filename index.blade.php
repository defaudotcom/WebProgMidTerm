@extends('layouts.default')

@section('page-content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Croissant+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'outfit', sans-serif;
    scroll-behavior: smooth;
}

body {
    scroll-behavior: smooth;
    overflow-x: hidden;
    min-height: 200vh;
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px 100px;
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100000;
    transition: 0.6s;
}

header .logo img {
    position: relative;
    width: 60px;
    border-radius: 30px;
    float: left;
    
    margin-right: 15px;
    transition: 0.6s;
}

header ul {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

header ul li {
    display: inline-block;
    position: relative;
    list-style: none;
    margin-left: 20px;
}

header ul li a {
    position: relative;
    text-decoration: none;
    padding: 6px 15px;
    color: #4d4d4d;
    border-radius: 20px;
    transition: 0.6s;
}


header ul li a:hover {
    background: #4d4d4d;
    color: #e26868;
}

.clingy {
    padding: 5px 100px;
    background: #e26868;
}

.clingy .logo,
.clingy ul li a {
    color: #4d4d4d;

}

section {
    min-height: 100vh;
}

#home {
    background:#f0edd4;
    justify-content: center;
    align-items: center;
    color: #674747;
    display: flex;
}

#home h2 {
    font-family: 'croissant one', sans-serif;
    text-align: center;
    font-size: 8rem;
        line-height: 1.2;
        margin-bottom: 1rem;
}

#home h2 span{
    color: #FF7171;
    text-shadow: 0 0 4px rgba(255, 255, 255, 0.7), 0 0 8px rgba(255, 255, 255, 0.7), 0 0 12px rgba(255, 255, 255, 0.7);
}

#home h3 {
    font-size: 2rem;
    font-style: italic;
    text-align: center;
}

#home .scroll {
    width: 52px;
    height: 88px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: absolute;
    margin-left: 39%;
    background: #fff4e0 linear-gradient(transparent 0%, transparent 50%, #90aacb 50%, #90aacb 100%);
    background-size: 100% 200%;
    border-radius: 100px;
    animation: colorSlide 5s linear infinite, nudgeMouse 5s ease-out infinite;
}

.logo-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo-container img {
        margin-right: 10px; /* Adjust the margin as needed */
        max-width: 100px; /* Adjust the max-width as needed */
    }

.scroll::after, 
.scroll::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    margin: auto;
}

.scroll::before {
    width: 46px;
    height: 82px;
    background-color: #f9d5a7;
    border-radius: 100px;
}

.scroll::after {
    background-color: #90aacb;
    width: 10px;
    height: 10px;
    border-radius: 100%;
    animation: Ball 5s linear infinite;
}

    #about {
    display: flex;
    align-items: center;
    color: white;
    background-image: url(img/about-img.png);
    background-size: cover;
    background-repeat: no-repeat;
}

#about h2 {
    font-family: 'poppins', sans-serif;
    text-shadow: 0 0 2px rgba(255, 255, 255, 0.5), 0 0 4px rgba(255, 255, 255, 0.5), 0 0 6px rgba(255, 255, 255, 0.5);
    margin-left: 70px;
    font-size: 50px;
    font-weight: 700;
    justify-content: left;
}


#about p {
    width: 79vw;
    margin-left: 70px;
    font-size: 20px;
    text-align: left;
    font-weight: 540;
    justify-content: left;
}

#about a {
    position: absolute;
    right: 0;
    margin-top: 100px;
    margin-right: 70px;
    justify-content: right;
    text-decoration: none;
    padding: 8px 30px;
    border-radius: 40px;
    background-color: #4d4d4d;
    color: #fff4e0;
    font-size: 1em;
    z-index: 9;
    cursor: pointer;
}

#about a:hover {
    background: #fff4e0;
    color: #4d4d4d;
}

#donation {
    display: flex;
    justify-content: right;
    align-items: center;
    color: #fff4e0;
    background-image: url(img/donation-img.png);
    background-size: cover;
    background-repeat: no-repeat;
    text-align: right;
}

#donation h2 {
    font-family: 'poppins', sans-serif;
    text-shadow: 0 0 2px rgba(255, 255, 255, 0.5), 0 0 4px rgba(255, 255, 255, 0.5), 0 0 6px rgba(255, 255, 255, 0.5);
    margin-right: 70px;
    font-size: 50px;
    font-weight: 700;
}

#donation p {
    width: 79vw;
    margin-right: 70px;
    font-size: 20px;
    text-align: right;
    font-weight: 540;
}

#donation a {
    position: absolute;
    left: 0;
    margin-top: 100px;
    margin-left: 70px;
    justify-content: left;
    text-decoration: none;
    padding: 8px 30px;
    border-radius: 40px;
    background-color: #fff4e0;
    color: #90aacb;
    font-size: 1em;
    z-index: 9;
    cursor: pointer;
}

#donation a:hover {
    background: #334a67;
    color: #fff4e0;
}

#volunteer {
    display: flex;
    justify-content: left;
    align-items: center;
    color: #4d4d4d;
    background-color: #f0edd4;
    background-size: cover;
    background-repeat: no-repeat;
}

#volunteer h2 {
    font-family: 'poppins', sans-serif;
    
    margin-left: 70px;
    font-size: 50px;
    font-weight: 700;
}

#volunteer p {
    
    margin-left: 10px;
    font-size: 30px;
    text-align: center;
    font-weight: 540;
}

#volunteer a {
    display: flex;
    flex-direction: column;
    align-items: center; 
    position: absolute;
    right: 0;
    margin-top: 50px;
    margin-right: 670px;
    justify-content: center;
    text-decoration: none;
    padding: 8px 30px;
    border-radius: 40px;
    background-color: #e26868;
    color: #fff4e0;
    font-size: 1em;
    z-index: 9;
    cursor: pointer;
}

#volunteer a:hover {
    background: #4d4d4d;
    color: #e26868;
}
            </style>

        <section id="home">
            <div>
            <div class="logo-container">
            <img src="./img/Paw Logo.png" alt="Paw Logo" class="mb-4">
            <h2>Pet <span class="text-pink-500"> Kingdom</span></h2>
                </div>
                <h3>~~~Pet Adoption Center.</h3>
            </div>
        </section>

        <section id="about">
            <div>
                <h2>About Us</h2>
                <br>
                <p>Welcome to our Pet Adoption Center, where we are dedicated to saving and rehoming a wide variety of animals, 
                    including chickens, cats, dogs, turtles, and more. Our mission is to provide a loving and caring environment 
                    for these animals in need, offering them a second chance at a happy and fulfilling life. Whether you're looking 
                    to adopt a new furry friend or simply want to support our cause, our center is a haven for animal lovers. 
                    Join us in making a difference in the lives of these wonderful creatures, one adoption at a time.</p>
                <br><br>
                <a href="#donation">next</a>
            </div>
        </section>

        <section id="donation">
            <div>
                <h2>Why Donate?</h2>
                <br>
                <p> Your contribution helps us rescue animals from dire situations, such as abuse, neglect, or abandonment. It provides essential funding for their medical care, food, and shelter as they recover. </p>
                <br><br>
                <a href="#volunteer">next</a>
            </div>
        </section>
        
        <section id="volunteer">
            <div>
                <h2>Interested in being a volunteer? Join us! Be A Rescuer!</h2>
                <br>
                <p>Create an account to be a rescuer! Help our buddies to find their new home.</p>
            <a href="/signup" class="text-blue-700">Sign up</a>
                <br>
            </div>
        </section>

        </div>

        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector("header");
                header.classList.toggle("clingy", window.scrollY > 0);
            })
        </script>
@endsection