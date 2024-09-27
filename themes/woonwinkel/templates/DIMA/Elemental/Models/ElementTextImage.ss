<% if $AlignImageLeft %>

<div class="container">
    <div class="content alignRight row container" id="$ID">
        <div class="contentimage col-12 col-lg-5">
            <% if VideoURL %>
                <iframe src="https://player.vimeo.com/video/$VideoURL?color=ef2200&byline=0&portrait=0" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            <% else %>
                <img src="$Image.ScaleWidth(900).URL" alt="Content foto">
            <% end_if %>
        </div>
        <div class="contentText col-12 col-lg-7">
            <h2>$Title</h2>
            $Text
            <% if $Button %><a href="$Button.Link" target="$Button.Target" title="Ga naar $Button.Title" class="button btn-dark">$Button.Title</a><% end_if %>
        </div>
    </div>
</div>

<% else %>

    <div class="container">
        <div class="content row" id="$ID">
            <div class="contentText col-12 col-lg-7">
                <h2>$Title</h2>
                $Text
                <% if $Button %><a href="$Button.Link" target="$Button.Target" title="Ga naar $Button.Title" class="button btn-dark">$Button.Title</a><% end_if %>
            </div>
            <div class="contentimage col-12 col-lg-5">
                <% if VideoURL %>
                    <iframe src="https://player.vimeo.com/video/$VideoURL?color=ef2200&byline=0&portrait=0" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                <% else %>
                    <img src="$Image.ScaleWidth(900).URL" alt="Content foto">
                <% end_if %>
            </div>
        </div>
    </div>
    
<% end_if %>