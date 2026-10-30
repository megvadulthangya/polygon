<style> /* This is a comment */ </style>

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

    if (typeof window.tsParticles.items !== "undefined" && window.tsParticles.items.length > 0) {
      console.log("tsParticles already initialized.");
      return;
    }

    var container = document.getElementById("tsparticles");
    if (!container) {
      console.error("#tsparticles container not found.");
      return;
    }

    var options = {
      fpsLimit: 30,
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
          value: 80
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
            (container && container.particles ? container.particles.count : "unknown")
        );
      })
      .catch(function (error) {
        console.error("tsParticles initialization failed:", error);
      });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initParticles);
  } else {
    initParticles();
  }
})();
</script>

{{-- This is a comment --}}

<?php // This is a comment ?>