<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<% if $Pages %>
		<a href="$BaseHref">Home</a>
		<span class="breadcrumbDelimiter"></span>
		<% loop $Pages %>
			<% if $Last %>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<meta itemprop="position" content="$Pos">
					<span itemprop="name">$MenuTitle.XML</span>
				</span>
			<% else %>
				<% if not Up.Unlinked %>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a href="$Link" class="breadcrumb-$Pos" itemprop="item" >
					<% end_if %>
						<span itemprop="name">$MenuTitle.XML</span>
						<meta itemprop="position" content="$Pos">	
					<% if not Up.Unlinked %>
						</a>
					</span>
				<% end_if %>
				<span class="breadcrumbDelimiter"></span>
			<% end_if %>
		<% end_loop %>
	<% end_if %>
</div>