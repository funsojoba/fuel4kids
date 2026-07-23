#!/bin/bash
# Downloads all images/video from the current fuel4kidscan.org site into public/images.
# Run this ONCE from the project root BEFORE the old site is taken down:
#   bash download-images.sh
set -e
cd "$(dirname "$0")/public"
mkdir -p images/team images/partners images/gallery videos

B="https://fuel4kidscan.org/wp-content/uploads"
dl() { echo "-> $2"; curl -sSL -o "$2" "$1"; }

dl "$B/2026/06/cropped-1-141x73.webp"                                        images/logo.webp
dl "https://fuel4kidscan.org/wp-content/uploads/2026/07/icon_2-300x300.png"  images/favicon.png
dl "$B/2026/06/1-1-1024x733.png"                                             images/community.png
dl "$B/2026/06/about-us-1024x635.jpg"                                        images/about-hero.jpg
dl "$B/2026/06/main-1024x733.png"                                            images/ourwork-main.png
dl "$B/2026/07/Jamaica_fuel4kids.png"                                        images/jamaica.png
dl "$B/2026/07/St.kitts_fuel4kids.png"                                       images/stkitts.png
dl "$B/2026/07/Toronto_fuel4kids.png"                                        images/toronto.png
dl "$B/2026/07/partnership-1024x576.webp"                                    images/partnership.webp

# Partner logos
dl "$B/2026/07/native_logo.png"          images/partners/native.png
dl "$B/2026/07/heartsandmind_logo.png"   images/partners/heartsandmind.png
dl "$B/2026/07/fosterfamily_logo.png"    images/partners/fosterfamily.png

# Impact gallery (About page)
dl "$B/2026/07/kids5-576x1024.jpeg"                                          images/gallery/impact-1.jpeg
dl "$B/2026/07/WhatsApp-Image-2026-07-07-at-12.53.13-AM-9-576x1024.jpeg"     images/gallery/impact-2.jpeg
dl "$B/2026/07/WhatsApp-Image-2026-07-07-at-12.53.13-AM-3-768x1024.jpeg"     images/gallery/impact-3.jpeg

# Volunteer gallery
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_28-1024x768.jpg"  images/gallery/volunteer-1.jpg
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_19-768x1024.jpg"  images/gallery/volunteer-2.jpg
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_23-768x1024.jpg"  images/gallery/volunteer-3.jpg
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_25-1024x768.jpg"  images/gallery/volunteer-4.jpg

# Donate page photos
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_6-1024x768.webp"  images/gallery/donate-1.webp
dl "$B/2026/06/PHOTO-2026-06-26-02-00-24_36-768x1024.webp" images/gallery/donate-2.webp

# Team photos
dl "$B/2026/07/Joan-A.-Monzac.png"            images/team/joan-monzac.png
dl "$B/2026/07/Arthur-Awele-Onwuegbuzie.png"  images/team/arthur-onwuegbuzie.png
dl "$B/2026/07/Ryhana-Wong-Jeffers-1.png"     images/team/ryhana-wong-jeffers.png
dl "$B/2026/07/Lenore-Mogent.png"             images/team/lenore-mogent.png
dl "$B/2026/07/Carole-Robinson-1.png"         images/team/carole-robinson.png
dl "$B/2026/07/Verna-G.png"                   images/team/verna-grante.png
dl "$B/2026/07/Sybil-Newton-Bryant_2.png"     images/team/sybil-newton-bryant.png

# Intro video
dl "$B/2026/07/fuel4kids_intro.mp4"           videos/fuel4kids_intro.mp4

echo ""
echo "All assets downloaded into public/images and public/videos."
