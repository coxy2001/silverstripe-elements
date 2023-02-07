<div class="$ContainerClass" <% if $MaxWidth %>style="max-width:{$MaxWidth}px;"<% end_if %>>
    <% if $ShowTitle && $Title %>
        <h2 class="element__title">$Title</h2>
    <% end_if %>

    <div class="embed__ratio-container" <% if $Resolution %>style="padding-bottom:{$Resolution}%;"<% end_if %>>
        <div class="embed__holder">
            $HTML
        </div>
    </div>
</div>