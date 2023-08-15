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
                                <% if $Logo %>
                                    <div class="testimonials__header">
                                        <img class="testimonials__logo" src="$Logo.URL" alt="$Logo.Title">
                                    </div>
                                <% end_if %>
                                <div class="testimonials__content">
                                    $Content
                                </div>
                                <% if $Name || $Position || $Affiliation %>
                                    <div class="testimonials__footer">
                                        <% if $Name %>
                                            <div class="testimonials__name">$Name</div>
                                        <% end_if %>
                                        <% if $Position %>
                                            <div class="testimonials__position">$Position</div>
                                        <% end_if %>
                                        <% if $Affiliation %>
                                            <div class="testimonials__affiliation">$Affiliation</div>
                                        <% end_if %>
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