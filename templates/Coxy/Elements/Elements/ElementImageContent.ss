<div class="$ContainerClass">
    <% if $ShowTitle && $Title %>
        <h2 class="element__title">$Title</h2>
    <% end_if %>

    <div class="image-content__row">
        <div class="image-content__col">
            $Content
        </div>
        <% if $File %>
            <div class="image-content__col">
                <img class="image-content__image" src="$File.URL" alt="$File.Title">
            </div>
        <% end_if %>
    </div>
</div>