


    <div class="navItems">
    <div id="upperNavLeft1">
        <ul>
            <li>
                <a href="mailto:$SiteConfig.Email"><i class="fas fa-envelope"></i> $SiteConfig.Email</a>
            </li>
            <li>
                <a href="tel:$SiteConfig.Phone"><i class="fas fa-phone-alt"></i> $SiteConfig.Phone</a>
            </li>
            <li>
                <a href="https://www.paulineswoonwinkel.nl/contact/">$SiteConfig.TopbarTextLine</a>
            </li>
        </ul>

    </div>

        <ul>
                <a href="$BaseHref" id="logo_navbar">
                        <img src="$SiteConfig.Logo.scaleWidth(250).url" alt="Logo" stle="width:30%">
                                </a>
            <% loop $Menu(1) %>
                <% if $Children %>
                    <li>
                        <a href="$Link" class="<% if $isCurrent %>active<% end_if %>">$Title</a>
                        <div class="navDropdown">
                            <ul>
                                <% loop $Children %>
                                    <li><a href="$Link">$Title</a></li>
                                <% end_loop %>
                            </ul>
                        </div>
                    </li>
                <% else %>
                    <li><a href="$Link" class="<% if $isCurrent %>active<% end_if %>">$Title</a></li>

                <% end_if %>
            <% end_loop %>
            </a>


            <form class="searchBox"method="GET" action="/zoeken" id="searchButton">
              <input class="fas fa-search searchInput"type="text" name="s" placeholder="Zoeken...">
              <i class='fas fa-search'></i>
              </form>
  
        </ul>

    </div>

<div id="mobileNav" class="row">
    <div id="mobileNavLeft">
        <a href="$BaseHref">
            <img src="$SiteConfig.LogoWhite.scaleWidth(200).url" alt="Logo">

        </a>
    </div>

    <div id="mobileNavRight" class="float-right">
        <ul>   
            <li> 
            <form class="searchBox"method="GET" action="/zoeken" id="searchButton1">
              <input class="fas fa-search searchInput"type="text" name="s" placeholder="Zoeken...">
              <i class='fas fa-search'></i>
              </form>
              </li>
            <li><a href="mailto:$SiteConfig.Email"><i class="fas fa-envelope"></i></a></li>
            <li><a href="tel:$SiteConfig.Phone"><i class="fas fa-phone"></i></a></li>
            <li id="mobileMenuButton"><i class="fas fa-bars"></i></li>
        </ul>
    </div>
</div>
<div id="mobileSlideout">
    <div id="mobileSlideoutHeader">
        <img src="$SiteConfig.LogoWhite.scaleWidth(300).url" alt="Logo">

        <div id="mobileSlideoutRight">
            <span class="navItem"><a href="mailto:$SiteConfig.Email"><i class="fas fa-envelope"></i></a></span>
            <span class="navItem"><a href="tel:$SiteConfig.Phone"><i class="fas fa-phone"></i></a></span>
            <span class="navItem" id="mobileMenuCloseButton"><i class="fas fa-times"></i></span>
        </div>
    </div>
    <div id="mobileSlideoutItems">
        <ul>
            <% loop $Menu(1) %>
                <% if $Children %>
                    <li>
                        <a href="$Link" class="<% if $isCurrent %>active<% end_if %>">$Title</a>
                        <button type="button"><i class="fas fa-caret-down"></i></button>
                        <div class="navDropdown-mob collapse">
                            <ul>
                                <% loop $Children %>
                                    <li><a href="$Link">$Title</a></li>
                                <% end_loop %>
                            </ul>
                        </div>
                    </li>
                <% else %>
                    <li><a href="$Link" class="<% if $isCurrent %>active<% end_if %>">$Title</a></li>
                <% end_if %>
            <% end_loop %>
        </ul>
        <form method="GET" action="/zoeken" id="mobileNavSearchForm">
            <input type="text" name="s" placeholder="Zoeken...">
        </form>
    </div>
</div>

<div id="mobileSlideoutBackground" class="row"></div>
