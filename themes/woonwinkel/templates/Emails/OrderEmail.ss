
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table style="margin: 0 auto; font-family: Arial; " width="600" id="main">
                    <tr style="background-color: #222222; text-align: center;">
                        <td style="padding: 10px 0;" colspan="2"><img src="$SiteConfig.LogoWhite.ScaleHeight(75).Url" style="height: 60px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h2>Bestelling #$ID</h2></td>
                    </tr>
                    <tr>
                        <td colspan="2">Er is zojuist een bestelling geplaatst via $SiteConfig.Title:</td>
                    </tr>
                    <tr>
                        <th>Naam:</th>
                        <td>$Name</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>$Email</td>
                    </tr>
                    <tr>
                        <th>Telefoon:</th>
                        <td>$Phone</td>
                    </tr>
                    <tr>
                        <th>Adres:</th>
                        <td>$Street<br>{$Postal}, $City</td>
                    </tr>
                    <tr>
                        <th>Product:</th>
                        <td><a href="$ProductLink">$ProductName</a></td>
                    </tr>
                    <tr>
                        <th>Opmerkingen:</th>
                        <td>$Message</td>
                    </tr>
                    <tr id="spacer" style="height: 15px;"></tr>
                    <tr id="footer">
                        <td colspan="2">
                            <span>&copy; 2019 Paulines Woonwinkel</span><br>
                            <a href="$BaseHref">Website</a> - <a href="{$BaseHref}admin">CMS</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>    
    </table>