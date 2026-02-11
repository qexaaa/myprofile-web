console.log('home-pagination.js loaded');

document.addEventListener('click', async function (e) {
    const btn = e.target.closest('.home-pagination');
    if (!btn) return;

    e.preventDefault();

    const url = btn.dataset.url;
    const target = btn.dataset.target;

    console.log('clicked', target, url);

    if (!url) return;

    const wrapper = document.querySelector(
        target === 'portfolio'
            ? '#home-portfolio-wrapper'
            : '#home-certificate-wrapper'
    );

    if (!wrapper) {
        console.error('wrapper not found');
        return;
    }

    wrapper.innerHTML = shimmerCards(target === 'portfolio' ? 3 : 4);

    try {
        const res = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const html = await res.text();

        wrapper.style.opacity = 0;
        setTimeout(() => {
            wrapper.innerHTML = html;
            wrapper.style.opacity = 1;
        }, 200);

    } catch (err) {
        console.error(err);
    }
});

function shimmerCards(count = 3) {
    let html = '<div class="row g-4">';
    for (let i = 0; i < count; i++) {
        html += `
            <div class="col-md-4">
                <div class="card p-3 skeleton"></div>
            </div>
        `;
    }
    html += '</div>';
    return html;
}
