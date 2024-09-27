<% include Navbar %>

<style>
.SearchPage .product {background:#fff;}
</style>

<div class="contentHolder">
        <% if $Content %><div class="container" id="content">$Content</div><% end_if %>
        <div class="container">
		<div class="row">
		
			
            <% if $SearchResults.TotalItems == 0 %>
            <div class="col-12 text-center"> <br><br>   <p>Er zijn geen resultaten gevonden voor {$SearchString}</p> </div>
            <% else %>
			 <div class="col-12 text-center"><br><br>
                    <h2>Zoekresultaten voor: {$SearchString}</h2>
                    <hr>
                    <p>
					
                     <% if $SearchResults.TotalItems > 1 %>
                            Er zijn {$SearchResults.TotalItems} resultaten
                        <% else %>
                            Er is {$SearchResults.TotalItems} resultaat
                        <% end_if %>
                    </p>
				</div>
                    <% loop $SearchResults %>
                        <% include Product %>
                    <% end_loop %>
				</div>	
			</div>    
                <div class="row" id="paginatedInfo">
                        <div class="paginatedIndex float-left">
                            Pagina {$SearchResults.CurrentPage} van {$SearchResults.TotalPages}    
                        </div>

                        <% if $SearchResults.MoreThanOnePage %>
                            <div class="paginatedNumbers">
                                <% if $SearchResults.Pages %>

                                    <div class="numbers">
                                    <a href="$SearchResults.PrevLink" class="prev pageButton">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>

                                        <% loop $SearchResults.Pages %>
                                            <% if $CurrentBool %>
                                                <span class="number pageButton current">
                                                    $PageNum
                                                </span>
                                            <% else %>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>
                                            <% end_if %>
                                        <% end_loop %>

                                    <a href="$SearchResults.NextLink" class="next pageButton">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                    </div>
                                <% end_if %>
                            </div>
                        <% end_if %>
                    </div>
            <% end_if %>
        </div>
        <div class="divider-empty"></div>
</div>

<% include Footer %>