<div class="breadcrumbs productBreadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<div class="breadcrumbItem" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="$BaseHref">
			<span itemprop="name">Home</span>
		</a>
		<meta itemprop="position" content="1">
	</div>

	<span class="breadcrumbDelimiter"></span>

	<% loop $Top.customBreadCrumbs %>
		<div class="breadcrumbItem" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a itemprop="item" href="$Link">
				<span itemprop="name">$Name</span>
				<%-- <meta itemprop="position" content="$Pos"> --%>
			</a>
		</div>
		
		<span class="breadcrumbDelimiter"></span>
	<% end_loop %>

	<% loop $Product %>
		<div class="breadcrumbItem">
			$Title
			<%-- <meta itemprop="position" content="$Top.CustomBreadCrumbs.Count"> --%>
		</div>
	<% end_loop %>
</div>
