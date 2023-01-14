<div class="$ContainerClass">
    <% if $ShowTitle && $Title %>
        <h2 class="element__title">$Title</h2>
    <% end_if %>

    <% if Testimonials %>
        <section <% if Testimonials.Count > 1 %>class="splide splide--regular"<% end_if %>>
            <div class="splide__track">
                <ul class="splide__list">
                    <% loop Testimonials %>
                        <li class="splide__slide">
                            <div class="testimonials__item">
                                <div class="testimonials__content">
                                    $Content
                                </div>
                                <% if $Name || $Affiliation %>
                                    <div class="testimonials__footer">
                                        <% if $Name %>$Name<% end_if %>
                                        <% if $Name && $Affiliation %> - <% end_if %>
                                        <% if $Affiliation %>$Affiliation<% end_if %>
                                    </div>
                                <% end_if %>
                            </div>
                        </li>
                    <% end_loop %>
                </ul>
            </div>
        </section>
    <% end_if %>
</div>