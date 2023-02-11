<div class="parallax__image" style="background-image: url({$Image.URL})"></div>
<div class="parallax__container $ContainerClass">
    <div class="parallax__content">
        <% if $ShowTitle && $Title %>
            <h2 class="element__title">$Title</h2>
        <% end_if %>
        $Content
    </div>
</div>