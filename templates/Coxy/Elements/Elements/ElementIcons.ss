<div class="$ContainerClass">
    <% if $ShowTitle && $Title %>
        <h2 class="element__title">$Title</h2>
    <% end_if %>

    <% if $Icons %>
        <div class="icons__grid">
            <% loop $Icons.Sort('Sort') %>
                <div class="icons__grid-item">
                    <a class="icons__link" href="$CTALink.LinkURL" $TargetAttr>
                        <div class="icons__card">
                            <% if $Image %>
                                <img class="icons__image" src="$Image.URL" alt="$Image.Title">
                            <% end_if %>
                            <% if $Title %>
                                <h5 class="icons__title">$Title</h5>
                            <% end_if %>
                            $Content
                        </div>
                    </a>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>

    <div class="icons__block-link-holder">
        $CTALink.setClass('icons__block-link btn btn--primary')
    </div>
</div>