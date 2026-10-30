
{{--
    Gshoots Polygon custom body-end enhancements.

    Replaces [[NVIDIA]] markers in visible page text
    with the NVIDIA-green SVG mark.

    Works in headings, paragraphs, lists and text blocks.

    Required asset:
    extra/custom-assets/nvidia.svg
--}}

<style>
    .gshoots-nvidia-heading-icon {
        display: inline-block;
        width: 1.15em;
        height: 1.15em;
        margin: 0 0.18em;
        object-fit: contain;
        vertical-align: -0.2em;
    }
</style>

<script>
(function () {
    'use strict';

    var markerTest = /\[\[NVIDIA\]\]/i;
    var markerSplit = /\[\[NVIDIA\]\]/gi;
    var iconUrl = "{{ themeAsset('nvidia.svg') }}";

    var excludedTags = [
        'SCRIPT',
        'STYLE',
        'NOSCRIPT',
        'TEXTAREA',
        'INPUT',
        'SELECT',
        'OPTION',
        'CODE',
        'PRE',
        'TEMPLATE'
    ];

    function isEligibleTextNode(node) {
        var parent = node.parentElement;

        while (parent && parent !== document.body) {
            if (excludedTags.indexOf(parent.tagName) !== -1) {
                return false;
            }

            parent = parent.parentElement;
        }

        return parent === document.body;
    }

    function replaceMarkers(root) {
        var walker = document.createTreeWalker(
            root,
            NodeFilter.SHOW_TEXT
        );

        var textNodes = [];

        while (walker.nextNode()) {
            var node = walker.currentNode;
            var content = node.nodeValue || '';

            if (
                markerTest.test(content) &&
                isEligibleTextNode(node)
            ) {
                textNodes.push(node);
            }
        }

        textNodes.forEach(function (textNode) {
            var content = textNode.nodeValue || '';

            if (!markerTest.test(content)) {
                return;
            }

            var parts = content.split(markerSplit);
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

    function initialize() {
        if (document.body) {
            replaceMarkers(document.body);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initialize,
            { once: true }
        );
    } else {
        initialize();
    }
})();
</script>
