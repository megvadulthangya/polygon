
{{--
    Gshoots Polygon custom body-end enhancements.

    Replaces the [[NVIDIA]] marker in Heading blocks
    with the NVIDIA-green SVG mark.

    Required asset:
    extra/custom-assets/nvidia.svg
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

    var markerPattern = /\[\[NVIDIA\]\]/gi;
    var iconUrl = "{{ themeAsset('nvidia.svg') }}";

    function replaceNvidiaMarkers(heading) {
        var walker = document.createTreeWalker(
            heading,
            NodeFilter.SHOW_TEXT
        );

        var textNodes = [];

        while (walker.nextNode()) {
            textNodes.push(walker.currentNode);
        }

        textNodes.forEach(function (textNode) {
            var content = textNode.nodeValue || '';

            if (!/\[\[NVIDIA\]\]/i.test(content)) {
                return;
            }

            var parts = content.split(markerPattern);
            var fragment = document.createDocumentFragment();

            parts.forEach(function (part, index) {
                if (part) {
                    fragment.appendChild(
                        document.createTextNode(part)
                    );
                }

                if (index < parts.length - 1) {
                    var icon = document.createElement('img');

                    icon.className = 'gshoots-nvidia-heading-icon';
                    icon.src = iconUrl;
                    icon.alt = '';
                    icon.setAttribute('aria-hidden', 'true');
                    icon.setAttribute('draggable', 'false');

                    fragment.appendChild(icon);
                }
            });

            if (textNode.parentNode) {
                textNode.parentNode.replaceChild(
                    fragment,
                    textNode
                );
            }
        });
    }

    function addNvidiaHeadingIcons() {
        document.querySelectorAll('h2').forEach(function (heading) {
            replaceNvidiaMarkers(heading);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            addNvidiaHeadingIcons,
            { once: true }
        );
    } else {
        addNvidiaHeadingIcons();
    }
})();
</script>
