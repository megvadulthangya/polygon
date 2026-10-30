# Gshoots Polygon

A customized LinkStack theme based on the original **Polygon** theme by JulianPrieber and the LinkStack Team.

This fork preserves the original Polygon appearance and tsParticles background while adding a targeted visual customization for the NVIDIA project section on [links.gshoots.hu](https://links.gshoots.hu).

- **Theme Name:** Gshoots Polygon
- **Theme Version:** 1.4.1
- **Theme Date:** 2026-10-30
- **Original Theme Authors:** JulianPrieber & LinkStack Team
- **Fork Maintainer:** Gyöngyösi Gábor
- **Maintainer Profile:** https://github.com/megvadulthangya
- **License:** GPLv3 (inherited from the original Polygon theme)
- **Upstream Theme:** https://github.com/LinkStackOrg/polygon
- **Maintained Fork:** https://github.com/megvadulthangya/polygon

## Customization

### NVIDIA heading icon

The theme adds an NVIDIA-green SVG mark next to the Heading block whose text exactly matches:

`NVIDIA Driver Maintenance & Legacy Support`

The icon is loaded from:

`extra/custom-assets/nvidia.svg`

The insertion is handled by `extra/custom-body-end.blade.php`. No LinkStack core files or built-in block templates are modified.

If the heading text is changed, update the `targetHeading` value in `extra/custom-body-end.blade.php` to match it.

## Installation

1. Keep the original theme directory structure, including `extra/custom-assets/nvidia.svg`.
2. Package the theme directory as a ZIP archive.
3. Upload the ZIP through LinkStack's theme management interface.
4. Select **Gshoots Polygon** for the profile.
5. Ensure **Allow custom code in themes** is enabled in the LinkStack instance configuration.

## Updating

This is a separately maintained theme fork. Install updates from this repository as a theme ZIP, preserving the theme directory and its `extra/` assets.

The `Source code:` theme metadata entry is intentionally omitted so LinkStack's built-in Theme Updater does not identify this customized fork as the upstream Polygon theme. Updates to this fork are managed separately.

## Original theme credits and third-party assets

- **Polygon** — JulianPrieber & LinkStack Team: https://github.com/LinkStackOrg/polygon
- **Skeleton** — MIT License: https://github.com/dhg/Skeleton
- **Linktree theme base** — MIT License: https://github.com/johnggli/linktree (license: https://github.com/johnggli/linktree/blob/master/LICENSE.md)
- **tsParticles** — MIT License: https://github.com/matteobruni/tsparticles (license: https://github.com/matteobruni/tsparticles/blob/main/LICENSE)
- **NVIDIA icon** — Simple Icons project: https://github.com/simple-icons/simple-icons

The original Polygon theme is distributed under GPLv3. Original authorship and attribution are retained; this repository contains modifications maintained by Gyöngyösi Gábor.
