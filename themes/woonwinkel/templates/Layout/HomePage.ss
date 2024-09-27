<% include Navbar %>

    <%--<div class="container">--%>
        <%--<div class="content row" id="about">--%>
            <%--<div class="contentText col-12 col-lg-7">--%>
                <%--$Content--%>
                <%--<% if $ContentButton %><a href="$ContentButton.LinkURL" target="$ContentButton.Target" title="Ga naar $ContentButton.Title" class="button btn-dark">$ContentButton.Title</a><% end_if %>--%>
            <%--</div>--%>
            <%--<div class="contentimage col-12 col-lg-5">--%>
              <%--<% if ContentImage %>  <img src="$ContentImage.ScaleWidth(900).URL" alt="$ContentImage.Title"> <% end_if %>--%>
            <%--</div>--%>
        <%--</div>--%>
    <%--</div>--%>





        <%-- <div class="container"> --%>
    <div class="container" id="categories">
            <% if $Categories %>
                <% loop $Categories %>
                    <a href="$URLSegment">
                        <div  class="categoryHomepage $Size <% if $Odd %>odd<% end_if %>">
                            <div class="categoryHomepageText">
                                <p>$MenuTitle</p>
                                <div id="start_box"><h1 id="start-meerinfo" href="$SiteConfig.MoreInfoLink.LinkURL?id={$ID}" <% if $SiteConfig.MoreInfoLink.Target %>target="$SiteConfig.MoreInfoLink.Target"<% end_if %>>Bekijk de collectie</h1></div>
                            </div>
                            <div class="categoryHomepageOverlay"></div>
                            <div class="categoryHomepageImage">
                                <img src="$Image.scaleWidth(900).url" alt="$Image.url">
                            </div>
                        </div>
                    </a>
                <% end_loop %>
            <% end_if %>
        </div>

    <div class="divider-empty"></div>




	    <div class="divider-empty"></div>


    <% include Highlighted %>


    <div class="divider"></div>

    <div class="container swiper-container" id="saleSlider">
        <div class="content row" id="about">
            <div class="contentText col-12 col-lg-7">
                $Content
                <% if $ContentButton %><a href="$ContentButton.LinkURL" target="$ContentButton.Target" title="Ga naar $ContentButton.Title" class="button btn-dark">$ContentButton.Title</a><% end_if %>
            </div>
            <div class="contentimage col-12 col-lg-5">
                <% if ContentImage %>  <img src="$ContentImage.ScaleWidth(900).URL" alt="$ContentImage.Title"> <% end_if %>
            </div>
        </div>
    </div>

    <%--<div class="divider"></div>--%>

    <%--<div class="container">--%>
        <%--<div class="content row" id="unique">--%>
        <%--<% if $Content2Image %>--%>
            <%--<div class="contentimage col-12 col-lg-7">--%>
                <%--<img src="$Content2Image.ScaleWidth(900).URL" alt="Content foto">--%>
            <%--</div>--%>
            <%--<div class="contentText col-12 col-lg-7">--%>
                <%--$Content2--%>
                <%--<% if $Content2Button %><a href="$Content2Button.LinkURL" target="$Content2Button.Target" title="Ga naar $Content2Button.Title" class="button btn-dark">$Content2Button.Title</a><% end_if %>--%>
            <%--</div>--%>


        <%--<% else %>--%>

              <%--<div class="contentText col-12 col-lg-12 text-center">--%>
                <%--$Content2--%>
             <%--<% if $Content2Button %>   <a href="$Content2Button.LinkURL" target="$Content2Button.Target" title="Ga naar $Content2Button.Title" class="button btn-dark">$Content2Button.Title</a><% end_if %>--%>
            <%--</div>--%>
        <%--<% end_if %>    --%>
	<%--</div>--%>


    </div>

	<div class="divider"></div>




  <div class="container" >
      <div class="swiper-container" id="homepageSlider" >
          <div class="swiper-wrapper">
              <% loop $SliderImages.Sort(Sort) %>
              <div class="swiper-slide">
                  <div class="sliderText">
                      <h2>$Title</h2>
                      <% if $Button %><a href="$Button.LinkURL" class="button btn-white" target="_self">$Button.Title</a><% end_if %>
                  </div>
                  <div class="sliderOverlay"></div>
                  <div class="sliderImage">
                      <img src="$Image.ScaleWidth(1920).URL" alt="$Image.url">
                  </div>
              </div>
              <% end_loop %>
          </div>
      </div>
  </div>


<% include Footer %>
