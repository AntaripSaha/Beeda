<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Social media Meta Tags -->
    <meta property="og:url" content="https://beeda.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Beeda Mega App- A Mega App Platform">
    <meta property="og:description" content="Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel, and more.">
    <meta property="og:image" content=" https://beeda.com/assets/front/img/beeda_white_logo.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="beeda.com">
    <meta property="twitter:url" content="https://beeda.com/">
    <meta name="twitter:title" content="Beeda Mega App- A Mega App Platform">
    <meta name="twitter:description" content="Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel, and more.">
    <meta name="twitter:image" content="https://scontent.fdac99-1.fna.fbcdn.net/v/t39.30808-6/321369159_1527524304416404_7417830470071739237_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=19026a&_nc_eui2=AeHo1aAsDV2Klp0AmYOqrT0HMd1JVt_OSjAx3UlW385KMOKoRZuw4aSGgz1Z4wqJ7AhQ3Spv4cjd7pe3xDBu_xOp&_nc_ohc=P60UFx6DdvMAX_kqKaa&_nc_ht=scontent.fdac99-1.fna&oh=00_AfDKwMDuhdrLUWkltLAKfs_fQWWLh_RIjG1to-u4LIIb1Q&oe=63AF14E5">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <title>Beeda Mega App- A Mega App Platform</title>
    <link rel="icon" href="https://d2t5292uahafuy.cloudfront.net/public/assets/img/app+icon.png" type="image/png">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- new -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('assets/front/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('assets/front/css/style.css?v=1') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/font/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <meta name="google-site-verification" content="8RdCGTombcALg4qMaxCBKFyexZC12x8TnwI6-VB7VYI" />
</head>
<body>
<!-- only in home page -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "MobileApplication",
    "name": "Beeda Mega App",
    "operatingSystem": "Android, iOS",
    "applicationCategory": "Multivendor eCommerce and Delivery Service",
    "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5.0",
        "reviewCount": "198"
    },
    "screenshot": [
        "https://beeda.com/img/banner-phone.png",
        "https://beeda.com/img/beeda-store-woman-hand.png"
    ],
    "description": "Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are eCommerce, Food Delivery, Ride Sharing, Travel, and more.",
    "url": "https://beeda.com",
    "potentialAction": {
        "@type": "ViewAction",
        "target": [
            {
                "@type": "EntryPoint",
                "urlTemplate": "https://apps.apple.com/us/app/beeda/id1641292802",
                "actionPlatform": "ios"
            },
            {
                "@type": "EntryPoint",
                "urlTemplate": "https://play.google.com/store/apps/details?id=com.beeda.user",
                "actionPlatform": "android"
            }
        ]
    },
    "publisher": {
        "@type": "Organization",
        "name": "Beeda Inc.",
        "sameAs": [
            "https://twitter.com/beedamegaapp",
            "https://www.facebook.com/BeedaMegaApp/",
            "https://www.linkedin.com/company/beeda/",
            "https://www.reddit.com/user/beedaapp/",
            "https://www.youtube.com/@beedamegaapp",
            "https://www.instagram.com/beedamegaapp/",
            "https://www.pinterest.com/beedainc/",
            "https://beeda.quora.com/"
        ],
        "logo": "https://beeda.com/images/Frame.png",
        "location": {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "16 Madison Square West Associates, 16 Madison Square West",
                "addressLocality": "New York",
                "addressRegion": "New York",
                "postalCode": "NY 10010",
                "addressCountry": "United States"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "40.7429219",
                "longitude": "73.9915369"
            },
            "hasMap": "https://www.google.com/search?q=Beeda+INC+1115+Broadway+16+Madison+Square+West+12th+Floor+%E2%80%93+New+York%2C+NY+10010.&rlz=1C1CHBD_enBD1036BD1036&oq=Beeda+INC+1115+Broadway+16+Madison+Square+West+12th+Floor+%E2%80%93+New+York%2C+NY+10010.&aqs=chrome.0.69i59j69i60l3.1670j0j7&sourceid=chrome&ie=UTF-8",
            "contactPoint": {}
        }
    },
    "mainEntity": {
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What is Beeda Mega App?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Revolutionize your daily life with Beeda - the ultimate all-in-one solution. Enjoy effortless services designed to make things easier for users and vendors. Beeda Mega App is Currently Available in United States and United Arab Emirates only."
                }
            },
            {
                "@type": "Question",
                "name": "What Services does Beeda Mega App have?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Beeda Mega App offers a wide range of services, including e-commerce, ride sharing service, food delivery service, flower delivery service, online liquor delivery service, cooking gas delivery and more. It also supports various payment options for user and vendors."
                }
            },
            {
                "@type": "Question",
                "name": "Is Beeda Mega App free to use?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, Beeda Mega App is completely free to download and use. You can download Beeda App from Google Play Store and Apple App Store."
                }
            },
            {
                "@type": "Question",
                "name": "How can I get support for Beeda Mega App?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "If you have any questions or issues with Beeda Mega App, you can contact the support team through the app or visit the official website for more information. "
                }
            }
        ]
    }
}
</script>
<!-- only home home page end -->

<!-- Messenger Chat Plugin Code -->
<script src="//code.tidio.co/hfly7cg3gifeoojlmi58lbfijw6wo1oi.js" async></script>
<!-- Messenger Chat Plugin Code -->
<div id="app">
</div>

<!-- JavaScript Libraries -->
<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/js/easing.min.js') }}"></script>
<script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/js/hoverIntent.js') }}"></script>
<script src="{{ asset('assets/front/js/superfish.min.js') }}"></script>
<script src="{{ asset('assets/front/js/magnific-popup.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('assets/front/js/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('assets/front/js/main.js') }}"></script>
</body>
</html>
