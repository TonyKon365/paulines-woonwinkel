<!DOCTYPE html>
<html lang="nl-NL">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5WR2L62');</script>
<!-- End Google Tag Manager -->

    $MetaTags(false)
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <% if $isProduct %>

        <%-- FB/LinkedIn --%>
        <% loop $Product %>
            <meta property="og:url"                content="$Link" />
            <meta property="og:type"               content="Website" />
            <meta property="og:title"              content="$Title bij $Up.SiteConfig.Title" />
            <meta property="og:image"              content="$MainImage.Pad(700,300).AbsoluteURL" />
            <meta property="og:image:width"        content="700" />
            <meta property="og:image:height"       content="300" />
            <meta property="og:description"        content="$Description.LimitCharacters(97)" />

            <% if $MetaDesc %><meta name="description" content="{$MetaDesc}"><% else %><meta name="description" content="{$Description.limitCharacters(150)}"><% end_if %>
            <% if $MetaTitle %><meta name="title" content="{$MetaTitle}"><% else %> <meta name="title" content="{$Name} bij {$SiteConfig.Title}"> <% end_if %>
            <title>$Title | $SiteConfig.Title</title>
        <% end_loop %>
    <% end_if %>

    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="$ThemeDir/fontawsome/css/all.css">

    <title>$Title | $SiteConfig.Title  </title>
    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/style.css">
    <link rel="stylesheet" type="text/css" href="$ThemeDir/css/customstyle.css">
    <link rel="icon" href="$SiteConfig.Favicon.url">




</head>
<body id="$pageName" class="$ClassName" itemscope="" itemtype="http://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WR2L62"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<a id="button">&uarr;</a>
        $Layout

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="$Themedir/javascript/swiper.min.js"></script>
    <script src="$Themedir/javascript/matchHeight.js"></script>
    <script src="$ThemeDir/javascript/script.js"></script>
	<script src="$ThemeDir/javascript/cookiebar.js"></script>
    <script src="$ThemeDir/javascript/jquery.magnific-popup.min.js"></script>


    <script>
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>

<style>
#button {
  display: inline-block;
  background-color: #960610;
  width: 50px;
  color:#fff;
  height: 50px;
  line-height:45px;
  font-size:20px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s,
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}

#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}



</style>

</body>
</html>
