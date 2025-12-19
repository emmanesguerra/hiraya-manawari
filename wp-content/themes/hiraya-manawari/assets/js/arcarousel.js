
const items = document.querySelectorAll('.arc-item');
const total = items.length;

// Configuration
const visibleCount = 5; // number of cards visible at a time
const distanceX = 155;
const distanceY = 20;
const scaleMin = 0.65;
const scaleMax = 1;

let order = [...Array(total).keys()];

function render() {
    const centerIndex = Math.floor(visibleCount / 2); // 2 for 5 visible cards

    items.forEach((el, index) => {
        // Determine its relative position in the visible window
        const posInWindow = order.indexOf(index);

        if (posInWindow >= 0 && posInWindow < visibleCount) {
            const diff = posInWindow - centerIndex;

            const scale = scaleMax - Math.abs(diff) * (scaleMax - scaleMin) / centerIndex;
            const x = diff * distanceX;
            const y = Math.abs(diff) * distanceY;
            const opacity = 1 - Math.abs(diff) / centerIndex * 0.8;
            const zIndex = centerIndex - Math.abs(diff);

            el.style.opacity = opacity;
            el.style.zIndex = zIndex;
            el.style.transform = `
    translate(-50%, -50%)
    translateX(${x}px)
    translateY(${y}px)
    scale(${scale})
    rotateY(${diff * 10}deg)
    `;
        } else {
            // Hide the items outside the visible window
            el.style.opacity = 0;
            el.style.zIndex = 0;
            el.style.transform = `translate(-50%, -50%) scale(0)`;
        }
    });
}

function rotate() {
    order.push(order.shift()); // shift the first to last
    render();
}

render();
setInterval(rotate, 2600);