<% include Navbar %>

    <div class="contentHolder">
        <div class="row breadcrumbsHolder">
            <div class="container">
                $Breadcrumbs 
            </div>
        </div>
        <%-- $Content
        $Form --%>
        <div class="container">
            <div class="row" id="mainContact">
                <div class="col-12 col-lg-3">
                    <div id="contactInfo">
                        <h2>Contactinfo</h2>
                        <p>
                            $SiteConfig.Street<br>
                            $SiteConfig.Postal, $SiteConfig.City<br>
                            Tel: <a href="tel:$SiteConfig.Phone">$SiteConfig.Phone</a><br>
                            Email: <a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a><br>
                        </p>
                    </div>
                    
                    <div id="openingHours">
                        <h3>Openingstijden</h3>
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
                </div>

                <div class="col-12 col-lg-9">
                    <%--<div id="FlowUs">--%>
                        <%--<h2>$SiteConfig.FooterCol5Title</h2>--%>
                        <%--<div class="icons">--%>
                            <%--<div class="icon"><a href="$SiteConfig.FooterFacebookLink.LinkURL" target="$SiteConfig.FooterFacebookLink.Target">--%>
                                    <%--<i class="fab fa-facebook-f"></i>--%>
                                <%--</a>--%>
                            <%--</div>--%>
                            <%--<div class="icon">--%>
                                <%--<a href="$SiteConfig.FooterTwitterLink.LinkURL" target="$SiteConfig.FooterTwitterLink.Target">--%>
                                    <%--<i class="fab fa-twitter"></i>--%>
                                <%--</a>--%>
                            <%--</div>--%>
                            <%--<div class="icon"><a href="$SiteConfig.FooterInstagramLink.LinkURL" target="$SiteConfig.FooterInstagramLink.Target">--%>
                                    <%--<i class="fab fa-instagram"></i>--%>
                                <%--</a>--%>
                            <%--</div>--%>
                        <%--</div>--%>
                    <%--</div>--%>
                    <div class="container">
                        <div class="row" id="contactForm">
                            <h2>Contactformulier</h2>
                            $ContactForm
                        </div>
                    </div>
                    <%--<div id="contactMap">--%>
                        <%--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2449.3535720770146!2d5.562171815942258!3d52.127889572965856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c64ea1189d9439%3A0xb190146a2300c61f!2sPauline&#39;s%20Woonwinkel!5e0!3m2!1snl!2snl!4v1573116597729!5m2!1snl!2snl" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--%>
                    <%--</div>--%>
                </div>
            </div>
        </div>

        <%--<div class="divider"></div>--%>

        <%--<div class="container">--%>
            <%--<div class="row" id="contactForm">--%>
                <%--<h2>Contactformulier</h2>--%>
                <%--$ContactForm--%>
            <%--</div>--%>
        <%--</div>--%>

    </div>

<% include Footer %>