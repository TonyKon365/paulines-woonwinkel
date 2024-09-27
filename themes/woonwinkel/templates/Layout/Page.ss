<% include Navbar %>

<div class="contentHolder">
    <div class="row breadcrumbsHolder">
        <div class="container">
            $Breadcrumbs 
        </div>
    </div>
        <% if $Content %><div class="container" id="content">$Content</div><% end_if %>
        $Form
        $ElementalArea
</div>

<% include Footer %>