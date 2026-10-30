{{--
    Gshoots Polygon custom body-end enhancements.

    Adds the NVIDIA-green SVG mark to the matching Heading block.
    Required asset: extra/custom-assets/nvidia.svg
--}}

<style>
    .gshoots-nvidia-heading-icon {
        display: inline-block;
        width: 1.3em;
        height: 1.3em;
        margin-right: 0.45em;
        object-fit: contain;
        vertical-align: -0.24em;
    }
</style>

<script>
(function () {
    'use strict';

    var targetHeading = 'NVIDIA Driver Maintenance & Legacy Support';
    var iconUrl = "{{ themeAsset('nvidia.svg') }}";

    function addNvidiaHeadingIcon() {
        document.querySelectorAll('h2').forEach(function (heading) {
            var headingText = (heading.textContent || '').replace(/\s+/g, ' ').trim();

            if (headingText !== targetHeading) {
                return;
            }

            // Prevent duplicate insertion if this function is called again.
            if (heading.querySelector('.gshoots-nvidia-heading-icon')) {
                return;
            }

            var icon = document.createElement('img');
            icon.className = 'gshoots-nvidia-heading-icon';
            icon.src = iconUrl;
            icon.alt = '';
            icon.setAttribute('aria-hidden', 'true');
            icon.setAttribute('draggable', 'false');

            heading.insertBefore(icon, heading.firstChild);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', addNvidiaHeadingIcon, { once: true });
    } else {
        addNvidiaHeadingIcon();
    }
})();
</script>
