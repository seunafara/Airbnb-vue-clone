<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Propertee - Find and Rent Properties</title>
    <meta name="user-id" content="{{ optional(Auth::user())->id }}">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Roboto"
      rel="stylesheet"
    />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="./sass/m-propertee.css" /> -->
    <style>


      .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
      }
      .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
      }
      .avatar-upload .avatar-edit input {
        display: none;
      }
      .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
      }
      .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
      }
      .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
      }
      .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
      }
      .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }

      @media (min-width: 426px) {
        .router-link-exact-active .bottom-navigation-label{
          padding: 6px 12px 10px 12px !important;
          font-size: 14px !important;
          opacity: 1 !important;
          display: none !important;

        }
        .bottom-navigation-label {
          display: none !important;
        }

      }


      .card-title{
        padding: 0px 0px 0px 0px !important;
        font-size: 16px !important;

      }
    :root {
    font-family: "Roboto", sans-serif;
    font-size: 100%;
      --primary-1: #f44336;
}

    .form-field{
      --color: #f44336;
      outline: none;
      display: block;
      width: 100%;
      -webkit-appearance: none;
      background: #fff;
      border: 1px solid #cdd9ed;
      padding: 8px 16px;
      line-height: 22px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 6px;
      transition: border .3s ease;
    }

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html {
    overflow-y: scroll;
}

main {
    --color-main: #ea4335;
    --color-main-light: #ffad42;
    --color-main-dark: #bb4d00;
    --color-secondary: #ffc107;
    --color-background: #fafafa;

    background-color: var(--color-background);
    /* To not hide content below bottom nav */
    padding-bottom: 56px;
    min-height: 100vh;
  margin-bottom: 10px;
}

.bigTable {
    display: table;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
}

.cellInTheMiddle {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.smart-grid {
    width: 100%;
    height: 100%;
    display: grid;
    grid-gap: 8px;
    padding: 8px;
}

.card {
    background: #fff;
    border-radius: 2px;
    position: relative;
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.12), 0 1px 5px rgba(0, 0, 0, 0.2);
    transition: 375ms cubic-bezier(0.4, 0, 0.2, 1);
}

.card-title {
    padding: 24px 16px 16px 16px;
    font-size: 24px;
    font-weight: bold;
    color: rgba(0, 0, 0, 0.9);
}

.card-supporting-text {
    padding: 16px 16px 24px 16px;
    font-size: 14px;
    font-weight: 400;
    opacity: 0.8;
}

.card-actions {
    padding: 8px;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    width: 100%;
}

.button,
.bottom-navigation {
    user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -o-user-select: none;
}

.button {
    color: var(--color-main);
    border-radius: 2px;
    position: relative;
    height: 36px;
    margin: 0;
    min-width: 64px;
    padding: 0 24px;
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0;
    overflow: hidden;
    will-change: box-shadow;
    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1),
        background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1),
        color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    outline: none;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    line-height: 36px;
    vertical-align: middle;
}

.button:hover {
    background-color: rgba(158, 158, 158, 0.2);
}
.button:focus:not(:active) {
    background-color: rgba(0, 0, 0, 0.12);
}

.button:active {
    background-color: rgba(158, 158, 158, 0.4);
}

.button .flat-button:focus:not(:active) {
    background-color: rgba(0, 0, 0, 0.12);
}

.bottom-navigation {
    overflow: hidden;
    background-color: #ea4335;
    transition: 375ms;
    position: fixed;
    height: 56px;
    width: 100%;
    bottom: 0;
    right: 0;
    font-size: 24px;
    box-shadow: 0 3px 14px 3px rgba(0, 0, 0, 0.12),
        0 4px 15px rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-around;
}

.bottom-navigation .bottom-navigation-destination {
    padding: 16px 0 16px 0;
    float: left;
    text-align: center;
    flex-grow: 1;
    font-size: 12px;
    transition: 225ms cubic-bezier(0.4, 0.2, 0, 1);
    color: rgba(256, 256, 256, 0.87);
    cursor: pointer;
}

.bottom-navigation .bottom-navigation-destination.active {
    padding: 6px 12px 10px 12px;
}

.bottom-navigation-label {
    opacity: 0;
    transition: 225ms cubic-bezier(0.4, 0.2, 0, 1);
}

.bottom-navigation-destination.active .bottom-navigation-label {
    font-size: 14px;
    opacity: 1;
}

.bottom-navigation .bottom-navigation-destination .material-icons {
    font-size: 24px;
    z-index: 4;
    margin-bottom: 4px;
    display: block;
}

@media only screen and (max-width: 384px) {
    .smart-grid {
        display: block;
        padding: 8px;
    }

    .smart-grid > .card {
        margin-bottom: 8px;
    }
}

@media only screen and (max-width: 671px) {
    .smart-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    main {
        padding-bottom: 56px;
    }
}


@media screen and (min-width: 672px) {
    .smart-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    #logout {
        display: block;
    }
    #loader-pc{
    display: block;
  }

  #loader-mobile{
    display: none;
  }
    
    /* Bottom nav becomes side nav when screen is too big */
    .bottom-navigation {
        width: 64px;
        height: 100vh;
        left: 0;
        top: 0;
        right: initial;
        box-shadow: 0 3px 14px 3px rgba(0, 0, 0, 0.12),
            0 4px 15px rgba(0, 0, 0, 0.2);
        display: initial;
    }

    .bottom-navigation .bottom-navigation-destination {
        color: rgba(256, 256, 256, 0.54);
        padding: 20px;
    }

    /* No need for label on side nav */
    .bottom-navigation-label {
        display: block;
    }

    .bottom-navigation .bottom-navigation-destination.active {
        color: rgba(256, 256, 256, 0.87);
        padding: 20px;
    }

    .bottom-navigation .bottom-navigation-destination .material-icons {
        margin: 0;
    }

    /* <main> doesn't get covered by side nav */
    main {
        margin-left: 64px;
    }
}

@media only screen and (min-width: 1080px) {
    .smart-grid {
        padding: 30px;
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Shamelessly stolen from materialize */


@media (max-width: 425px){
    #logout {
        display: none;
    }
  #loader-pc{
    display: none;
  }
  #loader-mobile{
    display: block;
  }
}
    </style>
  </head>
  <body>
      <div id="app">
    <!-- partial:index.partial.html -->
    <main>
        <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>
    </main>

    <nav class="bottom-navigation">
{{--       <section--}}
{{--        class="bottom-navigation-destination"--}}
{{--        data-destination-color="#fbbc05"--}}
{{--      >--}}
{{--        <i class="material-icons">dashboard</i>--}}
{{--        <span class="bottom-navigation-label">Dashboard</span>--}}
{{--      </section>--}}
      <router-link
        class="bottom-navigation-destination"
        data-destination-color="#ea4335"
        style="text-decoration: none"
        to="/home"
      >
        <i class="material-icons">home</i>
        <span class="bottom-navigation-label">Home</span>
      </router-link>

      <router-link
        class="bottom-navigation-destination"
        data-destination-color="#34a853"
        style="text-decoration: none"
        to="/explore"
      >
        <i class="material-icons">explore</i>
        <span class="bottom-navigation-label">Explore</span>
      </router-link>

      <router-link
        class="bottom-navigation-destination"
        data-destination-color="#695f45"
        style="text-decoration: none"
        to="/addproperty"
      >
        <i class="material-icons">add</i>
        <span class="bottom-navigation-label">Add</span>
      </router-link>


      <router-link
        class="bottom-navigation-destination"
        data-destination-color="#4285f4"
        style="text-decoration:none;"
        to="/profile"
      >
        <i class="material-icons">account_box</i>
        <span class="bottom-navigation-label">Account</span>
        </router-link>

      <a
        class="bottom-navigation-destination"
        data-destination-color="#000000"
        style="text-decoration:none;"
        id="logout"
        href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
      >
        <i class="material-icons">logout</i>
        <span class="bottom-navigation-label">Logout</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
</a>
      
    </nav>

    </div>
    
    <!-- partial -->
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    "use strict";

const changeColor = (click, that) => {
    // Set color of bottom nav
    let target = $(that).parent(".bottom-navigation");
    let color = $(that).attr("data-destination-color");
    $(target).css("background-color", color);
    // You'll have to add more of this in order to change the whole theme
    $("main").css("--color-main", color);
};

const bottomNavClick = (e, that) => {
    $(".active").removeClass("active");
    // console.log(typeof that);
    $(that).addClass("active");
    changeColor(e, that);
};

$(".bottom-navigation-destination").on("click", (e) => {
    e.stopPropagation();
    let x = $(e.currentTarget).hasClass("router-link-exact-active");
    bottomNavClick(e, e.currentTarget);
    
});




    </script>

  </body>
</html>
