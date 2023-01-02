<div class="$ContainerClass">
    <% if $ShowTitle && $Title %>
        <h2 class="element__title">$Title</h2>
    <% end_if %>
    
    <% if $Images %>
        <div class="gallery__grid">
            <% loop $Images.Sort('Sort') %>
                <div class="gallery__grid-item">
                    <a class="gallery__photo" href="$URL" target="_blank">
                        <img class="gallery__image" src="$URL" alt="$Title">
                    </a>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
</div>