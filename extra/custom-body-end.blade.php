<style>
.nvidia-marker {
  display: inline-block;
  width: 1.1em;
  height: 1.1em;
  margin-inline: 0.12em;
  vertical-align: -0.15em;
  object-fit: contain;
}
</style>

<script>
(function () {
  "use strict";

  function initParticles() {
    if (!window.tsParticles) {
      console.error("tsParticles engine is not loaded.");
      return;
    }

    if (typeof window.loadSlim !== "function") {
      console.error("tsParticles slim bundle (loadSlim) is not loaded.");
      return;
    }

    if (
      typeof window.tsParticles.items !== "undefined" &&
      window.tsParticles.items.length > 0
    ) {
      console.log("tsParticles already initialized.");
      return;
    }

    var container = document.getElementById("tsparticles");

    if (!container) {
      console.error("#tsparticles container not found.");
      return;
    }

    var options = {
      fpsLimit: 60,
      detectRetina: false,
      pauseOnBlur: true,
      pauseOnOutsideViewport: true,

      interactivity: {
        detectsOn: "canvas",
        events: {
          onClick: {
            enable: true,
            mode: "push"
          },
          onHover: {
            enable: true,
            mode: "repulse"
          }
        },
        modes: {
          push: {
            quantity: 4
          },
          repulse: {
            distance: 200,
            duration: 0.4
          }
        }
      },

      particles: {
        paint: {
          color: {
            value: "#ffffff"
          },
          fill: {
            enable: true,
            color: {
              value: "#ffffff"
            }
          }
        },
        links: {
          color: "#ffffff",
          distance: 150,
          enable: true,
          opacity: 0.4,
          width: 1
        },
        move: {
          enable: true,
          direction: "none",
          outModes: {
            default: "out"
          },
          random: false,
          speed: 2,
          straight: false
        },
        number: {
          density: {
            enable: true,
            area: 800
          },
          value: 160
        },
        opacity: {
          value: 0.5
        },
        shape: {
          type: "circle"
        },
        size: {
          value: {
            min: 1,
            max: 5
          }
        }
      }
    };

    window
      .loadSlim(window.tsParticles)
      .then(function () {
        return window.tsParticles.load({
          id: "tsparticles",
          options: options
        });
      })
      .then(function (container) {
        console.log(
          "tsParticles initialized. Version: " +
            window.tsParticles.version +
            ", particles: " +
            (
              container && container.particles
                ? container.particles.count
                : "unknown"
            )
        );
      })
      .catch(function (error) {
        console.error("tsParticles initialization failed:", error);
      });
  }

  function initNvidiaMarkers() {
    var marker = "[[NVIDIA]]";
    var logoUrl = "{{ themeAsset('nvidia.svg') }}";
    var replacementCount = 0;

    var ignoredElements =
      "script, style, noscript, textarea, input, select, option, code, pre, svg, .nvidia-marker";

    function replaceMarker(textNode) {
      if (
        !textNode ||
        textNode.nodeType !== Node.TEXT_NODE ||
        !textNode.parentNode
      ) {
        return;
      }

      var parent = textNode.parentElement;

      if (!parent || parent.closest(ignoredElements)) {
        return;
      }

      var text = textNode.nodeValue;

      if (!text || text.indexOf(marker) === -1) {
        return;
      }

      var parts = text.split(marker);
      var fragment = document.createDocumentFragment();

      for (var i = 0; i < parts.length; i++) {
        if (parts[i]) {
          fragment.appendChild(
            document.createTextNode(parts[i])
          );
        }

        if (i < parts.length - 1) {
          var image = document.createElement("img");

          image.className = "nvidia-marker";
          image.src = logoUrl;
          image.alt = "NVIDIA";
          image.title = "NVIDIA";
          image.decoding = "async";
          image.draggable = false;

          fragment.appendChild(image);
          replacementCount++;
        }
      }

      textNode.parentNode.replaceChild(fragment, textNode);
    }

    function scanNode(rootNode) {
      if (!rootNode) {
        return;
      }

      if (rootNode.nodeType === Node.TEXT_NODE) {
        replaceMarker(rootNode);
        return;
      }

      if (
        rootNode.nodeType !== Node.ELEMENT_NODE &&
        rootNode.nodeType !== Node.DOCUMENT_NODE &&
        rootNode.nodeType !== Node.DOCUMENT_FRAGMENT_NODE
      ) {
        return;
      }

      if (
        rootNode.nodeType === Node.ELEMENT_NODE &&
        rootNode.matches(ignoredElements)
      ) {
        return;
      }

      var walker = document.createTreeWalker(
        rootNode,
        NodeFilter.SHOW_TEXT,
        {
          acceptNode: function (textNode) {
            var parent = textNode.parentElement;

            if (!parent || parent.closest(ignoredElements)) {
              return NodeFilter.FILTER_REJECT;
            }

            return textNode.nodeValue &&
              textNode.nodeValue.indexOf(marker) !== -1
                ? NodeFilter.FILTER_ACCEPT
                : NodeFilter.FILTER_REJECT;
          }
        }
      );

      var textNodes = [];

      while (walker.nextNode()) {
        textNodes.push(walker.currentNode);
      }

      textNodes.forEach(replaceMarker);
    }

    if (!document.body) {
      console.error(
        "NVIDIA marker initialization failed: document.body not found."
      );
      return;
    }

    if (!logoUrl || logoUrl.indexOf("{{") !== -1) {
      console.error("NVIDIA SVG URL was not resolved by Blade:", logoUrl);
      return;
    }

    scanNode(document.body);

    console.log(
      "NVIDIA marker replacement initialized. Replacements:",
      replacementCount
    );

    if (typeof MutationObserver !== "undefined") {
      var observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.type === "characterData") {
            scanNode(mutation.target);
            return;
          }

          mutation.addedNodes.forEach(scanNode);
        });
      });

      observer.observe(document.body, {
        childList: true,
        subtree: true,
        characterData: true
      });
    }
  }

  function initThemeFeatures() {
    initParticles();
    initNvidiaMarkers();
  }

  if (document.readyState === "loading") {
    document.addEventListener(
      "DOMContentLoaded",
      initThemeFeatures
    );
  } else {
    initThemeFeatures();
  }
})();
</script>

{{-- This is a comment --}}

<?php // This is a comment ?>
