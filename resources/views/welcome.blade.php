<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");

        * {
            box-sizing: border-box;
            cursor: none;
        }

        html,
        body {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background: black;
            font-family: Montserrat, sans-serif;
        }

        .glitch.active span:not(:last-child) {
            -webkit-animation-duration: 0.3s;
            animation-duration: 0.3s;
        }

        .glitch.active span:nth-child(odd) {
            -webkit-animation-name: slide-from-left;
            animation-name: slide-from-left;
        }

        .glitch.active span:nth-child(even) {
            -webkit-animation-name: slide-from-right;
            animation-name: slide-from-right;
        }

        .glitch.active span:last-child {
            -webkit-animation: reveal steps(1) forwards;
            animation: reveal steps(1) forwards;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .glitch span:not(:last-child) {
            --ratio: calc(100% / var(--slice-count));
            --top: calc(var(--ratio) * (var(--i) - 1));
            --bottom: calc(var(--ratio) * (var(--slice-count) - var(--i)));
            position: absolute;
            white-space: nowrap;
            -webkit-clip-path: inset(var(--top) 0 var(--bottom) 0);
            clip-path: inset(var(--top) 0 var(--bottom) 0);
        }

        .glitch span:last-child {
            opacity: 0;
        }

        @-webkit-keyframes slide-from-left {
            from {
                transform: translateX(-20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slide-from-left {
            from {
                transform: translateX(-20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @-webkit-keyframes slide-from-right {
            from {
                transform: translateX(20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slide-from-right {
            from {
                transform: translateX(20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @-webkit-keyframes reveal {
            to {
                opacity: 1;
            }
        }

        @keyframes reveal {
            to {
                opacity: 1;
            }
        }

        header {
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 60px;
        }

        @media screen and (max-width: 750px) {
            header {
                padding: 0 20px;
            }
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            line-height: 50px;
            text-align: center;
            text-decoration: none;
            color: white;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 4px;
        }

        .underline-menu {
            position: fixed;
            top: 27%;
            right: 5%;
            z-index: 1;
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0;
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            list-style-type: none;
            mix-blend-mode: difference;
        }

        .underline-menu:hover li:not(:hover) a {
            opacity: 0.2;
        }

        .underline-menu li {
            position: relative;
        }

        .underline-menu li::after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 2px;
            height: 100%;
            background: #3498db;
            transform: scaleY(0);
            transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .underline-menu li:hover::after,
        .underline-menu li.active::after {
            transform: scaleY(1);
        }

        .underline-menu li a {
            position: relative;
            display: flex;
            padding: 20px 10px 20px 10px;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            color: white;
            transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        #burger-toggle {
            position: absolute;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            opacity: 0;
        }

        #burger-toggle:checked~.overlay {
            opacity: 1;
            transform: scale(160);
        }

        #burger-toggle:checked~.burger-nav {
            pointer-events: auto;
        }

        #burger-toggle:checked~.burger-nav ul li {
            opacity: 1;
            transform: translateX(0);
        }

        #burger-toggle:checked~main {
            opacity: 0;
            pointer-events: none;
        }

        #burger-toggle:checked~.burger-menu .line:nth-child(1) {
            transform: translateY(calc(var(--burger-menu-radius) / 5)) rotate(45deg);
        }

        #burger-toggle:checked~.burger-menu .line:nth-child(2) {
            transform: scaleX(0);
        }

        #burger-toggle:checked~.burger-menu .line:nth-child(3) {
            transform: translateY(calc(var(--burger-menu-radius) / -5)) rotate(-45deg);
        }

        .burger-menu {
            --burger-menu-radius: 4em;
            position: fixed;
            top: 25px;
            right: 60px;
            z-index: 100;
            display: none;
            width: var(--burger-menu-radius);
            height: var(--burger-menu-radius);
            background: white;
            border: solid 2px rgba(149, 166, 167, 0.4);
            border-radius: 50%;
            outline: none;
            transition: 0.5s ease-in-out;
        }

        @media screen and (max-width: 750px) {
            .burger-menu {
                right: 18px;
            }
        }

        .burger-menu .line {
            position: absolute;
            left: 25%;
            width: 50%;
            height: 3px;
            background: rgba(43, 61, 79, 0.3);
            border-radius: 10px;
            overflow: hidden;
            pointer-events: none;
            transition: all 0.5s ease;
        }

        .burger-menu .line:nth-child(1) {
            top: 30%;
        }

        .burger-menu .line:nth-child(2) {
            top: 50%;
        }

        .burger-menu .line:nth-child(3) {
            top: 70%;
        }

        .burger-menu .line::after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #2980b9;
            transform: translateX(-100%);
            transition: all 0.25s ease;
        }

        .burger-menu .line:nth-child(2)::after {
            transition-delay: 0.1s;
        }

        .burger-menu .line:nth-child(3)::after {
            transition-delay: 0.2s;
        }

        .burger-menu:hover {
            box-shadow: 0.4px 0.4px 0.8px rgba(0, 0, 0, 0.042), 1px 1px 2px rgba(0, 0, 0, 0.061), 1.9px 1.9px 3.8px rgba(0, 0, 0, 0.075), 3.4px 3.4px 6.7px rgba(0, 0, 0, 0.089), 6.3px 6.3px 12.5px rgba(0, 0, 0, 0.108), 15px 15px 30px rgba(0, 0, 0, 0.15);
        }

        .burger-menu:hover .line::after {
            transform: translateX(0);
        }

        .overlay {
            position: fixed;
            top: 45px;
            right: 80px;
            width: 2em;
            height: 2em;
            background: #1a5780;
            border-radius: 50%;
            opacity: 0;
            transition: 0.5s ease-in-out;
            will-change: transform;
        }

        .burger-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        @media screen and (max-width: 750px) {
            .burger-nav {
                transform: translateY(-8%);
            }
        }

        .burger-nav ul {
            position: fixed;
            z-index: 101;
            display: flex;
            flex-direction: column;
            align-items: start;
            list-style-type: none;
        }

        .burger-nav ul li {
            padding: 6px 0;
            margin: 1em 3em;
            opacity: 0;
            transition: 0.6s cubic-bezier(0.365, 0.84, 0.44, 1);
        }

        .burger-nav ul li:nth-child(odd) {
            transform: translateX(-100%);
        }

        .burger-nav ul li:nth-child(even) {
            transform: translateX(100%);
        }

        .burger-nav ul li:nth-child(1) {
            transition-delay: 0.05s;
        }

        .burger-nav ul li:nth-child(2) {
            transition-delay: 0.1s;
        }

        .burger-nav ul li:nth-child(3) {
            transition-delay: 0.15s;
        }

        .burger-nav ul li:nth-child(4) {
            transition-delay: 0.2s;
        }

        .burger-nav ul li:nth-child(5) {
            transition-delay: 0.25s;
        }

        .burger-nav ul li a {
            position: relative;
            display: block;
            padding: 5px;
            font-size: 2em;
            text-decoration: none;
            text-transform: uppercase;
            color: white;
            transition: 0.5s;
        }

        .burger-nav ul li a::after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: #ff4281;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s;
        }

        @media screen and (max-width: 750px) {
            .burger-nav ul li a::after {
                transition: none;
            }
        }

        .burger-nav ul li a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        @media screen and (max-width: 750px) {
            .burger-nav ul li a:hover::after {
                transform: scaleX(0);
            }
        }

        @media screen and (max-width: 750px) {
            .underline-menu {
                display: none;
            }

            .burger-menu {
                display: block;
            }

            .logo {
                padding-top: 20px;
            }
        }

        .btn {
            --hue: 204;
            position: relative;
            padding: 1rem 1.5rem;
            margin-top: 40px;
            font-size: 0.8rem;
            line-height: 1.5;
            text-decoration: none;
            background-color: hsl(var(--hue), 70%, 53%);
            border: 1px solid hsl(var(--hue), 70%, 53%);
            outline: transparent;
            overflow: hidden;
            cursor: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            transition: 0.3s;
        }

        @media screen and (max-width: 750px) {
            .btn {
                margin-top: 20px;
                font-size: 0.7rem;
            }
        }

        .btn:hover {
            background: hsl(var(--hue), 70%, 43%);
        }

        .btn-ghost {
            color: hsl(var(--hue), 70%, 53%);
            background-color: transparent;
            border-color: hsl(var(--hue), 70%, 53%);
        }

        .btn-ghost:hover {
            color: white;
            background: hsl(var(--hue), 70%, 53%);
        }

        .btn-through {
            transition: 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .btn-through::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: hsl(var(--hue), 70%, 53%);
            transform: scaleX(0);
            transform-origin: right;
            mix-blend-mode: color-dodge;
            will-change: transform;
            transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .btn-through:hover {
            color: white;
            background: transparent;
        }

        .btn-through:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .cursor,
        .cursor-border {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 0.4rem;
            height: 0.4rem;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            will-change: transform;
            transition: 0.3s;
        }

        .cursor {
            background: #3498db;
        }

        .cursor-border {
            padding: 2rem;
            border: 0.1rem solid #3498db;
        }

        .cursor-border.on-focus {
            padding: 0.5rem;
            background: rgba(51, 152, 219, 0.5);
            border-color: transparent;
        }

        .cross-bar-glitch {
            position: relative;
        }

        .cross-bar-glitch.active .bars .bar {
            -webkit-animation: 0.6s cubic-bezier(0.4, 0.2, 0.175, 1) forwards;
            animation: 0.6s cubic-bezier(0.4, 0.2, 0.175, 1) forwards;
        }

        .cross-bar-glitch.active .bars .bar:nth-child(odd) {
            -webkit-animation-name: slide-left;
            animation-name: slide-left;
        }

        .cross-bar-glitch.active .bars .bar:nth-child(even) {
            -webkit-animation-name: slide-right;
            animation-name: slide-right;
        }

        .cross-bar-glitch.active .glitch {
            -webkit-animation: reveal forwards 0.3s;
            animation: reveal forwards 0.3s;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .cross-bar-glitch.active .glitch span:not(:last-child) {
            -webkit-animation-duration: 0.3s;
            animation-duration: 0.3s;
        }

        .cross-bar-glitch.active .glitch span:nth-child(odd) {
            -webkit-animation-name: slide-from-left;
            animation-name: slide-from-left;
        }

        .cross-bar-glitch.active .glitch span:nth-child(even) {
            -webkit-animation-name: slide-from-right;
            animation-name: slide-from-right;
        }

        .cross-bar-glitch.active .glitch span:last-child {
            -webkit-animation: reveal steps(1) forwards;
            animation: reveal steps(1) forwards;
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
        }

        .cross-bar-glitch .bars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .cross-bar-glitch .bars .bar {
            width: 100%;
            flex: 1;
            background: currentColor;
            border-radius: 50px;
        }

        .cross-bar-glitch .bars .bar:nth-child(odd) {
            transform: translateX(100%);
        }

        .cross-bar-glitch .bars .bar:nth-child(even) {
            transform: translateX(-100%);
        }

        .cross-bar-glitch .bars .bar:nth-child(1) {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .cross-bar-glitch .bars .bar:nth-child(2) {
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }

        .cross-bar-glitch .bars .bar:nth-child(3) {
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }

        .cross-bar-glitch .bars .bar:nth-child(4) {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .cross-bar-glitch .bars .bar:nth-child(5) {
            -webkit-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }

        .cross-bar-glitch .glitch {
            opacity: 0;
        }

        .cross-bar-glitch .glitch span:not(:last-child) {
            --ratio: calc(100% / var(--slice-count));
            --top: calc(var(--ratio) * (var(--i) - 1));
            --bottom: calc(var(--ratio) * (var(--slice-count) - var(--i)));
            position: absolute;
            color: currentColor;
            white-space: nowrap;
            -webkit-clip-path: inset(var(--top) 0 var(--bottom) 0);
            clip-path: inset(var(--top) 0 var(--bottom) 0);
        }

        .cross-bar-glitch .glitch span:last-child {
            opacity: 0;
        }

        @keyframes slide-from-left {
            from {
                transform: translateX(-20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slide-from-right {
            from {
                transform: translateX(20%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes reveal {
            to {
                opacity: 1;
            }
        }

        @-webkit-keyframes slide-left {
            to {
                transform: translateX(-100%);
            }
        }

        @keyframes slide-left {
            to {
                transform: translateX(-100%);
            }
        }

        @-webkit-keyframes slide-right {
            to {
                transform: translateX(100%);
            }
        }

        @keyframes slide-right {
            to {
                transform: translateX(100%);
            }
        }

        .staggered-rise-in {
            position: relative;
            display: flex;
            white-space: pre;
            overflow: hidden;
        }

        .staggered-rise-in span {
            transform: translateY(100%);
        }

        .staggered-rise-in.active span {
            -webkit-animation: rise-in 1s forwards;
            animation: rise-in 1s forwards;
        }

        @-webkit-keyframes rise-in {
            to {
                transform: translateY(-12%);
            }
        }

        @keyframes rise-in {
            to {
                transform: translateY(-12%);
            }
        }

        .card {
            --card-bg-color: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%);
            position: relative;
            width: 240px;
            color: white;
        }

        .card.active .card-borders .border-top {
            -webkit-animation: slide-in-horizontal 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
            animation: slide-in-horizontal 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
        }

        .card.active .card-borders .border-right {
            -webkit-animation: slide-in-vertical 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
            animation: slide-in-vertical 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
        }

        .card.active .card-borders .border-bottom {
            -webkit-animation: slide-in-horizontal-reverse 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
            animation: slide-in-horizontal-reverse 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
        }

        .card.active .card-borders .border-left {
            -webkit-animation: slide-in-vertical-reverse 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
            animation: slide-in-vertical-reverse 0.8s cubic-bezier(0.645, 0.045, 0.355, 1) forwards;
        }

        .card.active .card-content {
            -webkit-animation: bump-in 0.5s 0.8s forwards;
            animation: bump-in 0.5s 0.8s forwards;
        }

        .card.active .card-content .avatar {
            -webkit-animation: bump-in 0.5s 1s forwards;
            animation: bump-in 0.5s 1s forwards;
        }

        .card.active .card-content .username {
            -webkit-animation: fill-text-white 1.2s 2s forwards;
            animation: fill-text-white 1.2s 2s forwards;
        }

        .card.active .card-content .username::before {
            -webkit-animation: slide-in-out 1.2s 1.2s cubic-bezier(0.75, 0, 0, 1) forwards;
            animation: slide-in-out 1.2s 1.2s cubic-bezier(0.75, 0, 0, 1) forwards;
        }

        .card.active .card-content .info {
            -webkit-animation: fade-up 1.2s 2s forwards;
            animation: fade-up 1.2s 2s forwards;
        }

        .card .card-borders {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .card .card-borders .border-top {
            position: absolute;
            top: 0;
            width: 100%;
            height: 2px;
            background: var(--card-bg-color);
            transform: translateX(-100%);
        }

        .card .card-borders .border-right {
            position: absolute;
            right: 0;
            width: 2px;
            height: 100%;
            background: var(--card-bg-color);
            transform: translateY(100%);
        }

        .card .card-borders .border-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: var(--card-bg-color);
            transform: translateX(100%);
        }

        .card .card-borders .border-left {
            position: absolute;
            top: 0;
            width: 2px;
            height: 100%;
            background: var(--card-bg-color);
            transform: translateY(-100%);
        }

        .card .card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 360px;
            padding: 40px 0 40px 0;
            background: var(--card-bg-color);
            box-shadow: 0 0px 0.7px rgba(0, 0, 0, 0.056), 0 0px 1.7px rgba(0, 0, 0, 0.081), 0 0px 3.1px rgba(0, 0, 0, 0.1), 0 0px 5.6px rgba(0, 0, 0, 0.119), 0 0px 10.4px rgba(0, 0, 0, 0.144), 0 0px 25px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: scale(0.6);
        }

        .card .card-content .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 40px;
            opacity: 0;
            transform: scale(0.6);
        }

        .card .card-content .username {
            position: relative;
            font-size: 26px;
            letter-spacing: 2px;
            margin-bottom: 40px;
            color: transparent;
        }

        .card .card-content .username::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: black;
            background: white;
            transform: scaleX(0);
            transform-origin: left;
        }

        .card .card-content .info {
            font-size: 12px;
            text-align: center;
            opacity: 0;
            transform: translateY(20%);
        }

        @-webkit-keyframes bump-in {
            50% {
                transform: scale(1.05);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bump-in {
            50% {
                transform: scale(1.05);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @-webkit-keyframes slide-in-horizontal {
            50% {
                transform: translateX(0);
            }

            to {
                transform: translateX(100%);
            }
        }

        @keyframes slide-in-horizontal {
            50% {
                transform: translateX(0);
            }

            to {
                transform: translateX(100%);
            }
        }

        @-webkit-keyframes slide-in-horizontal-reverse {
            50% {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        @keyframes slide-in-horizontal-reverse {
            50% {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        @-webkit-keyframes slide-in-vertical {
            50% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100%);
            }
        }

        @keyframes slide-in-vertical {
            50% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100%);
            }
        }

        @-webkit-keyframes slide-in-vertical-reverse {
            50% {
                transform: translateY(0);
            }

            to {
                transform: translateY(100%);
            }
        }

        @keyframes slide-in-vertical-reverse {
            50% {
                transform: translateY(0);
            }

            to {
                transform: translateY(100%);
            }
        }

        @-webkit-keyframes slide-in-out {
            50% {
                transform: scaleX(1);
                transform-origin: left;
            }

            50.1% {
                transform-origin: right;
            }

            100% {
                transform: scaleX(0);
                transform-origin: right;
            }
        }

        @keyframes slide-in-out {
            50% {
                transform: scaleX(1);
                transform-origin: left;
            }

            50.1% {
                transform-origin: right;
            }

            100% {
                transform: scaleX(0);
                transform-origin: right;
            }
        }

        @-webkit-keyframes fill-text-white {
            to {
                color: white;
            }
        }

        @keyframes fill-text-white {
            to {
                color: white;
            }
        }

        .marker {
            position: relative;
            --marker-radius: 1em;
            --marker-diameter: calc(var(--marker-radius) * 2);
            --marker-color: #3498db;
        }

        .marker .pin {
            position: relative;
            z-index: 1;
            width: var(--marker-diameter);
            height: var(--marker-diameter);
            background: var(--marker-color);
            border-radius: 50% 50% 0 50%;
            -webkit-mask: radial-gradient(transparent calc(var(--marker-radius) / 2), black calc(var(--marker-radius) / 2));
            mask: radial-gradient(transparent calc(var(--marker-radius) / 2), black calc(var(--marker-radius) / 2));
            transform: rotate(45deg);
        }

        .marker .shadow {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: var(--marker-radius);
            height: var(--marker-radius);
            background: rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            transform: translate(50%, -10%) rotateX(60deg);
        }

        .marker .shadow::before {
            position: absolute;
            content: "";
            width: var(--marker-diameter);
            height: var(--marker-diameter);
            background: transparent;
            border: 1px solid var(--marker-color);
            border-radius: inherit;
            opacity: 0;
            transform: scale(0);
            -webkit-animation: pulse 1s infinite;
            animation: pulse 1s infinite;
        }

        @-webkit-keyframes pulse {
            50% {
                opacity: 1;
            }

            to {
                transform: scale(1.2);
            }
        }

        @keyframes pulse {
            50% {
                opacity: 1;
            }

            to {
                transform: scale(1.2);
            }
        }

        .timeline {
            position: relative;
            display: grid;
            gap: 40px;
            padding: 0;
            margin: 0;
            max-width: 600px;
            font-size: 0.75rem;
            line-height: 1;
            color: white;
            list-style-type: none;
            -webkit-clip-path: inset(0 0 100% 0);
            clip-path: inset(0 0 100% 0);
        }

        .timeline.active {
            -webkit-animation: expand 4s 0.6s forwards linear;
            animation: expand 4s 0.6s forwards linear;
        }

        @media screen and (max-width: 750px) {
            .timeline {
                -webkit-animation: none;
                animation: none;
                max-width: 60vw;
                -webkit-clip-path: inset(0 0 0 0);
                clip-path: inset(0 0 0 0);
                opacity: 0;
                transform: translateY(2%);
            }

            .timeline.active {
                -webkit-animation: fade-up 1.2s 0.6s forwards;
                animation: fade-up 1.2s 0.6s forwards;
            }
        }

        .timeline .timeline__line {
            position: absolute;
            top: 0;
            left: 6px;
            width: 4px;
            height: 100%;
            background: white;
        }

        .timeline .timeline__item .info {
            display: grid;
            grid-template-columns: repeat(3, auto) 1fr;
            align-items: center;
            gap: 0.3rem;
        }

        .timeline .timeline__item .info h4 {
            margin: 0;
        }

        .timeline .timeline__item .info a {
            text-decoration: none;
            color: #3498db;
        }

        .timeline .timeline__item .info .dot {
            position: relative;
            width: 16px;
            height: 16px;
            background: #1a1e23;
            border-radius: 50%;
        }

        .timeline .timeline__item .info .dot::before {
            position: absolute;
            content: "";
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: #1a1e23;
        }

        .timeline .timeline__item .info .dot::after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 8px;
            height: 8px;
            border: 4px solid white;
            border-radius: inherit;
        }

        .timeline .timeline__item .info .time {
            margin-right: 8px;
        }

        .timeline .timeline__item .content {
            margin: 1rem 0 0 3.9rem;
            line-height: 1.5;
        }

        @-webkit-keyframes expand {
            to {
                -webkit-clip-path: inset(0 0 0 0);
                clip-path: inset(0 0 0 0);
            }
        }

        @keyframes expand {
            to {
                -webkit-clip-path: inset(0 0 0 0);
                clip-path: inset(0 0 0 0);
            }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(20%);
        }

        .fade-up.active {
            -webkit-animation: fade-up 0.6s forwards;
            animation: fade-up 0.6s forwards;
        }

        @-webkit-keyframes fade-up {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-up {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            opacity: 0;
        }

        .fade-in.active {
            -webkit-animation: reveal 0.6s forwards;
            animation: reveal 0.6s forwards;
        }

        main {
            height: 100%;
            color: white;
        }

        main section h1,
        main section h2 {
            margin: 0;
        }

        main section h1 {
            font-size: 32px;
        }

        main section h2 {
            font-size: 14px;
        }

        main section p {
            margin: 0;
        }

        main .hero-section {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: linear-gradient(rgba(16, 16, 16, 0.8), rgba(16, 16, 16, 0.8)), url(https://images.unsplash.com/photo-1435575653489-b0873ec954e2?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
            background-position: center;
            background-size: cover;
        }

        main .hero-section h1 {
            margin-bottom: 8px;
            font-size: 46px;
            text-transform: uppercase;
        }

        main .hero-section h2 {
            font-size: 24px;
            font-weight: lighter;
        }

        @media screen and (max-width: 750px) {
            main .hero-section h1 {
                font-size: 30px;
            }

            main .hero-section h2 {
                font-size: 16px;
            }
        }

        main .normal-section {
            display: grid;
            justify-items: center;
            gap: 40px;
            padding: 48px 0;
            color: white;
        }

        main .normal-section#speakers,
        main .normal-section#sponsors {
            justify-items: normal;
        }

        main .normal-section .titles {
            display: grid;
            justify-items: center;
            gap: 20px;
            letter-spacing: 0.25em;
        }

        main .normal-section:nth-child(odd) {
            background: #eceffc;
            color: black;
        }

        main .normal-section:nth-child(even) {
            background: #1a1e23;
            color: white;
        }

        main #about {
            padding: 60px 0;
        }

        main #about .description {
            display: grid;
            gap: 24px;
            width: 60vw;
        }

        main #about .description p:nth-child(1) {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        main #about .description p:nth-child(2) {
            -webkit-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }

        main #about .description p:nth-child(3) {
            -webkit-animation-delay: 0.8s;
            animation-delay: 0.8s;
        }

        main #about .description p:nth-child(4) {
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        main #speakers .speakers-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            justify-items: center;
            gap: 2rem;
            margin: 0 12.5rem;
        }

        @media screen and (max-width: 750px) {
            main #speakers .speakers-cards {
                margin: 0;
            }
        }

        main #location .place {
            display: flex;
            align-items: center;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        main #location .place .marker {
            margin: 0 1em 0.5em 0;
        }

        main #location .place .place-name {
            font-size: 20px;
            font-weight: bold;
        }

        main #location #map {
            width: 60vw;
            height: 360px;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        main #sponsors .sponsors-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 2rem;
            margin: 0 12.5rem;
            padding: 0;
            list-style-type: none;
        }

        main #sponsors .sponsors-list li {
            text-align: center;
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }

        main #sponsors .sponsors-list li a {
            display: block;
            height: 100%;
        }

        main #sponsors .sponsors-list li a img {
            max-width: 150px;
            pointer-events: none;
        }

        @media screen and (max-width: 750px) {
            main #sponsors .sponsors-list {
                margin: 0;
            }
        }
    </style>
    <style>
        .logo-wrapper {
            display: inline-block;
            background: #fff;        /* background putih */
            padding: 10px;
            border-radius: 10px;
        }

        .logo-wrapper img {
            max-width: 100%;         /* responsif */
            height: auto;
            display: block;
        }

    </style>
</head>

<body>

    <div class="cursor"></div>
    <div class="cursor-border"></div>
    <header>
        <a href="#home" class="logo logo-wrapper">
            <img width="450px" src="{{asset('own_assets/logo/logo.png')}}" alt="Logo" />
        </a>

        <nav class="site-nav">
            <ul class="underline-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#speakers">Speakers</a></li>
                <li><a href="#schedule">Schedule</a></li>
                <li><a href="#location">Location</a></li>
                <li><a href="#sponsors">Sponsors</a></li>
            </ul>
        </nav>
    </header>
    <input type="checkbox" id="burger-toggle" />
    <label for="burger-toggle" class="burger-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </label>
    <div class="overlay"></div>
    <nav class="burger-nav">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#speakers">Speakers</a></li>
            <li><a href="#schedule">Schedule</a></li>
            <li><a href="#location">Location</a></li>
            <li><a href="#sponsors">Sponsors</a></li>
        </ul>
    </nav>
    <main>
        <section class="hero-section" id="home">
            <h1>
                中国第五届CSS开发者大会
            </h1>
            <h2>03.30 / 深圳</h2>
            <a class="btn btn-ghost btn-through" href="https://www.yuque.com/cssconf/5th" target="_blank">
                大会PPT及视频
            </a>
        </section>
        <section class="normal-section" id="about">
            <div class="titles">
                <h1 class="cross-bar-glitch" data-slice="20">ABOUT</h1>
                <h2 class="staggered-rise-in">大会简介</h2>
            </div>
            <div class="description">
                <p class="fade-up">
                    中国第五届CSS开发者大会于2019年03月30日在深圳举办。由W3C、w3ctech、前端圈主办。本次大会我们将邀请行业内知名讲师，与大家共聚深圳，畅聊CSS。
                </p>
                <p class="fade-up">
                    CSS布局经常是令前端开发者头痛的一块工作。但是近几年来，浏览器不断发展，开始支持弹性盒子、网格布局、盒模型对齐等布局功能。这些CSS标准纯粹是为了应付网络布局而编写的。我们将深入了解这些新属性的特征，新时代的布局技巧、例子及最佳实践。希望听众会有所启发，利用这些新的CSS属性创造更符合浏览器本质的设计。
                </p>
                <p class="fade-up">
                    虽然在 CSS
                    里不能直观地绘制出一条曲线，或者动态生成许多元素，我们仍然可以利用 CSS
                    属性自身的特性，结合一些基本方法和想象力生成出非常有趣的图形，进行艺术创作。此次演讲就把这些过程和所使用的方法分享给大家。
                </p>
                <p class="fade-up">
                    CSS的有趣之处就在于最终呈现出来的技能强弱与你自身的思维方式，创造力是密切相关的，本次分享通过一些精彩的案例，展现创意如何让CSS的视觉表现变得更有趣的。
                </p>
            </div>
        </section>
        <section class="normal-section" id="speakers">
            <div class="titles">
                <h1 class="cross-bar-glitch" data-slice="20">SPEAKERS</h1>
                <h2 class="staggered-rise-in">演讲嘉宾</h2>
            </div>
            <div class="speakers-cards">
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/cssconf5-brian.jpg" class="avatar" />
                        <div class="username">Brian Birtles</div>
                        <div class="info">火狐浏览器工程师<br />W3C CSS工作组成员</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/hjchen.jpg" class="avatar" />
                        <div class="username">陈慧晶</div>
                        <div class="info">知名CSS专家<br />Nexmo开发大使</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/cssconf5-zaizhen.jpg" class="avatar" />
                        <div class="username">陈在真</div>
                        <div class="info">腾讯CDC高级前端开发</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/damo.jpg" class="avatar" />
                        <div class="username">大漠</div>
                        <div class="info">知名CSS专家<br />阿里巴巴前端技术专家</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/gougu.jpg" class="avatar" />
                        <div class="username">勾三股四</div>
                        <div class="info">阿里巴巴高级前端技术专家</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/cssconf5-yuanchuan.jpg" class="avatar" />
                        <div class="username">袁川</div>
                        <div class="info">资深前端工程师<br />css-doodle 作者</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-borders">
                        <div class="border-top"></div>
                        <div class="border-right"></div>
                        <div class="border-bottom"></div>
                        <div class="border-left"></div>
                    </div>
                    <div class="card-content">
                        <img src="https://img.w3ctech.com/zhangxx@2x.jpg" class="avatar" />
                        <div class="username">张鑫旭</div>
                        <div class="info">
                            知名CSS专家<br />《CSS世界》作者<br />阅文集团前端开发
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="normal-section" id="schedule">
            <div class="titles">
                <h1 class="cross-bar-glitch" data-slice="20">SCHEDULE</h1>
                <h2 class="staggered-rise-in">日程安排</h2>
            </div>
            <ul class="timeline">
                <li class="timeline__line"></li>
                <li class="timeline__item start">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">08:30</time>
                        <h4 class="title">签到</h4>
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">09:30</time>
                        <h4 class="speaker">陈慧晶</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/hmzpxe">新时代CSS布局
                            </a>
                        </h4>
                    </div>
                    <div class="content">
                        ​CSS布局经常是令前端开发者头痛的一块工作。但是近几年来，浏览器不断发展，开始支持弹性盒子、网格布局、盒模型对齐等布局功能。这些CSS标准纯粹是为了应付网络布局而编写的。我们将深入了解这些新属性的特征，新时代的布局技巧、例子及最佳实践。希望听众会有所启发，利用这些新的CSS属性创造更符合浏览器本质的设计。
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">10:20</time>
                        <h4 class="speaker">大漠</h4>
                        <h4 class="title">
                            <a target="_blank"
                                href="https://www.yuque.com/cssconf/yog9rr/no7l1o">剖析css-tricks新版，为你所用</a>
                        </h4>
                    </div>
                    <div class="content">
                        新版css-tricks.com网站在社交媒体上得到众多好评，今天我们就一起来聊聊这次改版中运用到的一些新特性，这些新特性对用户体验带来什么样的改变，我们又如何将这些新特性运用于自己的项目中。
                    </div>
                </li>
                <li class="timeline__item break">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">12:00</time>
                        <h4 class="title">午餐</h4>
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">13:00</time>
                        <h4 class="speaker">张鑫旭</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/rpl1tf">CSS创意与视觉表现</a>
                        </h4>
                    </div>
                    <div class="content">
                        CSS的有趣之处就在于最终呈现出来的技能强弱与你自身的思维方式，创造力是密切相关的，本次分享通过一些精彩的案例，展现创意如何让CSS的视觉表现变得更有趣的。
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">14:00</time>
                        <h4 class="speaker">袁川</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/hyku3f">CSS生成艺术</a>
                        </h4>
                    </div>
                    <div class="content">
                        虽然在 CSS
                        里不能直观地绘制出一条曲线，或者动态生成许多元素，我们仍然可以利用 CSS
                        属性自身的特性，结合一些基本方法和想象力生成出非常有趣的图形，进行艺术创作。此次演讲就把这些过程和所使用的方法分享给大家。
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">14:50</time>
                        <h4 class="speaker">勾三股四</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/vg70mz">你不知道的五个 CSS 新特性</a>
                        </h4>
                    </div>                  
                    <div class="content">
                        分享五个讲者在近期学习标准的过程中，发现的鲜为人知的 CSS
                        特性，并通过相关代码、示例和故事，帮助大家发掘 CSS
                        更多的乐趣和用武之地。
                    </div>
                </li>
                <li class="timeline__item break">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">15:40</time>
                        <h4 class="title">Coffee Time</h4>
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">16:20</time>
                        <h4 class="speaker">Brian Birtles</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/nays55">10 things I wish CSS
                                authors knew about animations</a>
                        </h4>
                    </div>
                    <div class="content">
                        动画可以让你的网站或 app
                        更加自然、有趣、优美，但动画本身也可能是困难、缓慢、使人不悦的。让我们来一起看看一些浏览器发行者们希望作者们知道的，关于动画常见的误解、不为人知的特性、以及即将到来的技术。
                    </div>
                </li>
                <li class="timeline__item">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">17:30</time>
                        <h4 class="speaker">陈在真</h4>
                        <h4 class="title">
                            <a target="_blank" href="https://www.yuque.com/cssconf/yog9rr/hbix70">CSS TIME</a>
                        </h4>
                    </div>
                    <div class="content">
                        时间概念对于动画而言犹如灵魂一般，在WEB
                        CSS中同样存在着时间范畴，Duration? Delay?
                        究竟CSS的时间概念存在于哪些地方，又能起到哪些作用？我们将基于Demo实例由浅入深逐一分析CSS
                        TIME，也许从此你对它会有新的认知。
                    </div>
                </li>
                <li class="timeline__item end">
                    <div class="info">
                        <div class="dot"></div>
                        <time class="time">18:30</time>
                        <h4 class="title">结束</h4>
                    </div>
                </li>
            </ul>
        </section>
        <section class="normal-section" id="location">
            <div class="titles">
                <h1 class="cross-bar-glitch" data-slice="20">LOCATION</h1>
                <h2 class="staggered-rise-in">举办地点</h2>
            </div>
            <div class="place">
                <div class="marker fade-in">
                    <div class="pin"></div>
                    <div class="shadow"></div>
                </div>
                <div class="place-name cross-bar-glitch" data-slice="20">
                    深圳 科兴科学园
                </div>
            </div>
            <div id="map" class="fade-in"></div>
        </section>
        <section class="normal-section" id="sponsors">
            <div class="titles">
                <h1 class="cross-bar-glitch" data-slice="20">SPONSORS</h1>
                <h2 class="staggered-rise-in">赞助商</h2>
            </div>
            <ul class="sponsors-list">
                <li class="fade-up">
                    <a href="http://www.ucloud.cn" target="_blank">
                        <img src="https://img.w3ctech.com/ucloud-400.png" alt="Ucloud" />
                    </a>
                    <div>赞助商</div>
                </li>
                <li class="fade-up">
                    <a href="http://www.broadview.com.cn/" target="_blank">
                        <img src="https://img.w3ctech.com/bowen.png" alt="博文视点" />
                    </a>
                    <div>赞助商</div>
                </li>
                <li class="fade-up">
                    <a href="http://www.ituring.com.cn/" target="_blank">
                        <img src="https://img.w3ctech.com/turing-logo.png" alt="图灵教育" />
                    </a>
                    <div>赞助商</div>
                </li>
                <li class="fade-up">
                    <a href="http://www.epubit.com.cn/" target="_blank">
                        <img src="https://img.w3ctech.com/yibuclub.png" alt="异步社区" />
                    </a>
                    <div>赞助商</div>
                </li>
                <li class="fade-up">
                    <a href="http://www.w3cplus.com/" target="_blank">
                        <img src="https://img.w3ctech.com/w3c-plus-400.png" alt="w3cplus" />
                    </a>
                    <div>支持社区</div>
                </li>
                <li class="fade-up">
                    <a href=" https://zdk.f2er.net/" target="_blank">
                        <img src="https://img.w3ctech.com/zdk_400.png" alt="前端de早读课" />
                    </a>
                    <div>支持社区</div>
                </li>
                <li class="fade-up">
                    <a href="http://gold.xitu.io/" target="_blank">
                        <img src="https://img.w3ctech.com/juejin-logo.png" alt="稀土掘金" />
                    </a>
                    <div>支持社区</div>
                </li>
                <li class="fade-up">
                    <a href="http://qianduan.guru/" target="_blank"><img
                            src="https://img.w3ctech.com/frontendmagezine.png" alt="前端外刊评论" /></a>
                    <div>支持社区</div>
                </li>
                <li class="fade-up">
                    <a href="https://www.oschina.net/" target="_blank"><img src="https://img.w3ctech.com/oschina.png"
                            alt="开源中国" /></a>
                    <div>支持社区</div>
                </li>
                <li class="fade-up">
                    <a href="https://www.uisdc.com/" target="_blank"><img src="https://img.w3ctech.com/uisdc.png"
                            alt="优设" /></a>
                    <div>支持社区</div>
                </li>
            </ul>
        </section>
    </main>


    <script>
        // Header Underline https://codepen.io/alphardex/pen/JjoqbNP
        let underlineMenuItems = document.querySelectorAll(".underline-menu li");
        underlineMenuItems[0].classList.add("active");
        underlineMenuItems.forEach(item => {
            item.addEventListener("click", () => {
                underlineMenuItems.forEach(item => item.classList.remove("active"));
                item.classList.add("active");
            });
        });

        // Full Page Burger Navigation https://codepen.io/alphardex/pen/NWPBwYe
        let burgerMenuToggle = document.querySelector("#burger-toggle");
        let burgerMenuLinks = document.querySelectorAll(".burger-nav li a");
        burgerMenuLinks.forEach(link => {
            link.addEventListener("click", () => {
                (burgerMenuToggle as HTMLInputElement).checked = false;
            });
        });

        // Cursor Follow & Hover Effect https://codepen.io/alphardex/pen/jOEgYjr
        let cursor = document.querySelector(".cursor");
        let cursorBorder = document.querySelector(".cursor-border");
        let getXY = (event: Event, element: Element) => {
            let x = (event as MouseEvent).clientX;
            let y = (event as MouseEvent).clientY;
            let rect = element.getBoundingClientRect();
            x -= rect.width / 2;
            y -= rect.height / 2;
            return [x, y];
        };

        document.addEventListener("mouseenter", e => {
            cursor.animate([{
                opacity: 0
            }, {
                opacity: 1
            }], {
                duration: 300,
                fill: "forwards"
            });
            cursorBorder.animate(
                [{
                        opacity: 0
                    },
                    {
                        opacity: 0.8
                    }
                ], {
                    duration: 300,
                    fill: "forwards"
                }
            );
        });

        document.addEventListener("mousemove", e => {
            let [cursorX, cursorY] = getXY(e, cursor);
            let [cursorBorderX, cursorBorderY] = getXY(e, cursorBorder);
            let targetName = (e.target as HTMLElement).tagName;
            if (targetName === "A" || targetName === "LABEL" || targetName === "BUTTON") {
                cursorBorder.classList.add("on-focus");
            } else {
                cursorBorder.classList.remove("on-focus");
            }
            cursor.animate([{
                transform: `translate(${cursorX}px, ${cursorY}px)`
            }, {
                transform: `translate(${cursorX}px, ${cursorY}px)`
            }], {
                duration: 300,
                fill: "forwards",
                delay: 50
            });
            cursorBorder.animate(
                [{
                    transform: `translate(${cursorBorderX}px, ${cursorBorderY}px)`
                }, {
                    transform: `translate(${cursorBorderX}px, ${cursorBorderY}px)`
                }], {
                    duration: cursorBorder.classList.contains("on-focus") ? 1500 : 300,
                    fill: "forwards",
                    delay: 150
                }
            );
        });

        document.addEventListener("mouseleave", e => {
            cursor.animate([{
                opacity: 0.8
            }, {
                opacity: 0
            }], {
                duration: 500,
                fill: "forwards"
            });
            cursorBorder.animate(
                [{
                        opacity: 0.8
                    },
                    {
                        opacity: 0
                    }
                ], {
                    duration: 500,
                    fill: "forwards"
                }
            );
        });

        // Cross Bar Glitch Text https://codepen.io/alphardex/pen/VwLLLNG
        const random = (min: number, max: number) =>
            min + Math.floor(Math.random() * (max - min + 1));
        let crossBarGlitchTexts = document.querySelectorAll(".cross-bar-glitch");
        crossBarGlitchTexts.forEach(text => {
            let content = text.textContent;
            text.textContent = "";
            let slice = (text as HTMLElement).dataset.slice;
            let glitchText = document.createElement("div");
            glitchText.className = "glitch";
            (glitchText as HTMLElement).style.setProperty("--slice-count", slice);
            for (let i = 0; i <= Number(slice); i++) {
                let span = document.createElement("span");
                span.textContent = content;
                span.style.setProperty("--i", `${i + 1}`);
                if (i !== Number(slice)) {
                    span.style.animationDelay = `${800 + random(100, 300)}ms`;
                }
                glitchText.append(span);
            }
            text.appendChild(glitchText);
            let bars = document.createElement("div");
            bars.className = "bars";
            for (let i = 0; i < 5; i++) {
                let bar = document.createElement("div");
                bar.className = "bar";
                bars.append(bar);
            }
            text.append(bars);
        });

        // Staggered Rise In Text https://codepen.io/alphardex/pen/qBEmGbw
        let staggeredRiseInTexts = document.querySelectorAll(".staggered-rise-in");
        staggeredRiseInTexts.forEach(text => {
            let letters = text.textContent.split("");
            text.textContent = "";
            letters.forEach((letter, i) => {
                let span = document.createElement("span");
                span.textContent = letter;
                span.style.animationDelay = `${i / 20}s`;
                text.append(span);
            });
        });

        // Observe the elements which have animations to fire.
        let observer = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("active");
                    }
                });
            }, {
                rootMargin: "0px 0px -140px"
            }
        );

        let titles = document.querySelectorAll(".titles > *");
        titles.forEach(title => observer.observe(title));
        let paragraphs = document.querySelectorAll("p");
        paragraphs.forEach(p => observer.observe(p));
        let profileCards = document.querySelectorAll(".card");
        profileCards.forEach(profileCard => observer.observe(profileCard));
        let timeline = document.querySelector(".timeline");
        observer.observe(timeline);
        let marker = document.querySelector(".marker");
        observer.observe(marker);
        let placeName = document.querySelector(".place-name");
        observer.observe(placeName);
        let map = document.querySelector("#map");
        observer.observe(map);
        let sponsorList = document.querySelectorAll(".sponsors-list li");
        sponsorList.forEach(sponsor => observer.observe(sponsor));

        // Baidu Map API
        let bmap = new BMap.Map("map");
        let point = new BMap.Point(113.950148, 22.553891);
        bmap.centerAndZoom(point, 18);
    </script>

</body>

</html>
