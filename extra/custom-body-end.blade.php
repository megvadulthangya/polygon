<style> /* This is a comment */ </style>

<script>
document.addEventListener("DOMContentLoaded", async () => {
  // Ellenőrizzük, hogy a tsParticles és a loadSlim elérhető-e
  if (typeof tsParticles === "undefined" || typeof loadSlim === "undefined") {
    console.error("tsParticles vagy loadSlim nem található. Ellenőrizd a slim bundle betöltését.");
    return;
  }

  if (tsParticles.dom().some(c => c.id === "tsparticles")) {
    return;
  }

  await loadSlim(tsParticles);

  await tsParticles.load({
    id: "tsparticles",
    options: {
      fpsLimit: 30,
      detectRetina: false,
      pauseOnBlur: true,
      pauseOnOutsideViewport: true,

      interactivity: {
        detectsOn: "canvas",
        events: {
          onClick: { enable: true, mode: "push" },
          onHover: { enable: true, mode: "repulse" },
          resize: true
        },
        modes: {
          push: { quantity: 4 },
          repulse: { distance: 200, duration: 0.4 }
        }
      },

      particles: {
        paint: {
          fill: {
            color: { value: "#ffffff" }
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
          direction: "none",
          enable: true,
          outModes: { default: "out" },
          random: false,
          speed: 2,
          straight: false
        },
        number: {
          density: { enable: true, area: 800 },
          value: 80
        },
        opacity: { value: 0.5 },
        shape: { type: "circle" },
        size: { value: { min: 1, max: 5 } }
      }
    }
  });
});
</script>

{{-- This is a comment --}}

<?php // This is a comment ?>