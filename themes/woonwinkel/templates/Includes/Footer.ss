<footer id="footer">
    <div id="upperFooter" class="row">
        <div class="container">
            <div class="row" id="footer_row">
                <div class="col-12 col-md-4 col-lg-2">
                    <h2>$SiteConfig.FooterCol1Title</h2>
                    <p>
                        $SiteConfig.Street<br>
                        $SiteConfig.Postal  $SiteConfig.City<br>
                        Tel: <a href="tel:$SiteConfig.Phone">$SiteConfig.Phone</a><br>
                        <a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a><br>
                    </p>
                </div>
                <div class="col-12 col-md" >
                    <h2>$SiteConfig.FooterCol2Title</h2>
                    <table>
                        <tr>
                            <td>Ma</td>
                            <td>$SiteConfig.OpenHoursMon</td>
                        </tr>
                        <tr>
                            <td>Di</td>
                            <td>$SiteConfig.OpenHoursDiDo</td>
                        </tr>
                        <tr>
                            <td>Wo</td>
                            <td>$SiteConfig.OpenHoursDiDo</td>
                        </tr>
                        <tr>
                            <td>Do</td>
                            <td>$SiteConfig.OpenHoursDiDo</td>
                        </tr>
                        <tr>
                            <td>Vrij</td>
                            <td>$SiteConfig.OpenHoursFri</td>
                        </tr>
                        <tr>
                            <td>Za</td>
                            <td>$SiteConfig.OpenHoursSat</td>
                        </tr>
                    </table>
                    <p>Zondagen + feestdagen gesloten</p>
                </div>
                <div class="col-12 col-md">
                    <h2>$SiteConfig.FooterCol3Title</h2>
                    $SiteConfig.FooterCol3Content
                </div>
                <div class="col-12 col-md">
                    <h2>$SiteConfig.FooterCol4Title</h2>
                    $SiteConfig.FooterCol4Content
                </div>
                <div class="col-12 col-md">
                    <h2>$SiteConfig.FooterCol5Title</h2>
                    <div class="icons">
                        <% if $SiteConfig.FooterFacebookLink %>
                            <div class="icon">
                                <a href="$SiteConfig.FooterFacebookLink.LinkURL" target="$SiteConfig.FooterFacebookLink.Target">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                        <% end_if %>
                        <% if $SiteConfig.FooterTwitterLink %>
                            <div class="icon">
                                <a href="$SiteConfig.FooterTwitterLink.LinkURL" target="$SiteConfig.FooterTwitterLink.Target">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        <% end_if %>
                        <% if $SiteConfig.FooterInstagramLink %>
                            <div class="icon">
                                <a href="$SiteConfig.FooterInstagramLink.LinkURL" target="$SiteConfig.FooterInstagramLink.Target">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        <% end_if %>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lowerFooter" class="row">
        <div class="container">
            <div id="lowerFooterLeft">
                <span>&copy; $SiteConfig.Title $Now.Year - Alle rechten voorbehouden | Ontwikkeling en Design door <a href="https://www.dima.nl" target="_blank">DIMA</a> & <a href="https://www.compushare.nl/" target="_blank">Compushare Automatiseringen.</a>  </span>
            </div>
            <div id="lowerFooterRight">
                <% if $SiteConfig.PrivacyLink %><a href="$SiteConfig.PrivacyLink.LinkURL"  target="$SiteConfig.PrivacyLink.Target">$SiteConfig.PrivacyLink.Title</a><% end_if %>
            </div>
        </div>
    </div>
</footer>
