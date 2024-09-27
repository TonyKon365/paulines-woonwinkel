<% include Navbar %>

    <div class="contentHolder">
        <div class="row breadcrumbsHolder">
            <div class="container">
                $Breadcrumbs
            </div>
        </div>

        <%--<div class="container">--%>
            <%--<div id="categoryContent">--%>
                <%--<div class="row">--%>
                    <%--<div class="col-12 col-lg-7">--%>
                        <%--<h1>$Title</h1>--%>
                        <%--$Content--%>
                    <%--</div>--%>
                    <%--<div class="col-12 col-lg-5">--%>
                        <%--<% if $ContentImage %><img src="$ContentImage.Fill(500, 250).url" alt="Content foto"><% end_if %>--%>
                    <%--</div>--%>
                <%--</div>--%>
            <%--</div>--%>
        <%--</div>--%>

        <%--<div class="divider"></div>--%>

    <div class="container">
        <div class="row">
            <% loop $Children %>
                <div class="col-6 col-lg-3">
                    <div class="subcategory">
                        <img id="sub_img" src="$ContentImage.scalewidth(500).URL">
                        <div class="subcategoryText">
                            <span class="subcategoryTitle">$Title</span>
                            <p>$Content.LimitWordCount(10)</p>
                            <a href="$URLSegment" class="button btn-filled-dark">Meer bekijken <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>

        <% if $Products %>
            <div class="container" id="container_productenview">
                <div class="row" id="paginatedItemCount">
                      <div class="col-12 col-lg-6">
                        <% if $PaginatedPages.TotalItems > 1 %>
                            Er zijn {$PaginatedPages.TotalItems} resultaten
                        <% else %>
                            Er is {$PaginatedPages.TotalItems} resultaat
                        <% end_if %>
                    </div>
                    <div class="col-12 col-lg-6 text-right">
                        <label for="pagination">Aantal producten:</label>
                        <select id="pagination">
                            <option value="" selected data-default>Aantal producten</option>
                            <option value="paginated-12">12 producten</option>
                            <option value="paginated-24">24 producten</option>
                            <option value="paginated-36">36 producten</option>
                            <option value="all-products">Alle producten</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <% loop $PaginatedPages %>
                        <% include Product %>
                    <% end_loop %>
                </div>
                <div class="row" id="paginatedInfo">
                    <div class="paginatedIndex">
                        Pagina {$PaginatedPages.CurrentPage} van {$PaginatedPages.TotalPages}
                    </div>

                    <% if $PaginatedPages.MoreThanOnePage %>
                        <div class="paginatedNumbers">
                            <% if $PaginatedPages.Pages %>

                                <div class="numbers">

                                <% if $PaginatedPages.PrevLink %>
                                    <a href="$PaginatedPages.PrevLink" class="prev pageButton">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                <% end_if %>

                                    <% loop $PaginatedPages.Pages %>
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

                                <% if $PaginatedPages.NextLink %>
                                    <a href="$PaginatedPages.NextLink" class="next pageButton">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                <% end_if %>
                                </div>
                            <% end_if %>
                        </div>
                    <% end_if %>
                </div>
            </div>
        <% end_if %>
    </div>
    <div class="divider-empty"></div>

<% include Footer %>
