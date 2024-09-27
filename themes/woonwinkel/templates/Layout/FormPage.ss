<% include Navbar %>

<% if Type == "MoreInfo" %>
    <div class="container">
        <div class="MoreInfoForm">
            <% if $Product %>
                <h2>Meer informatie over: $Product.Name</h2>
                <hr>
                $MoreInfoForm
            <% else %>
                <p>Pagina is niet goed geladen, probeer opnieuw.</p>
            <% end_if %>
        </div>
    </div>
<% end_if %>
<% if Type == "Order" %>
    <div class="container">
        <div class="OrderForm">
            <% if $Product %>
                <h2>{$Product.Name} bestellen</h2>
                <hr>
                $OrderForm
            <% else %>
                <p>Pagina is niet goed geladen, probeer opnieuw.</p>
            <% end_if %>
        </div>
    </div>
<% end_if %>

<% include Highlighted %>

<% include Footer %>

