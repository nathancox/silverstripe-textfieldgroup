
<div class="textfieldgroup" <% if ID %>id="$ID"<% end_if %>>
	<% loop FieldList %>
		<div class="textfieldgroup-field $FirstLast $EvenOdd">
			$SmallFieldHolder
		</div>
	<% end_loop %>
</div>