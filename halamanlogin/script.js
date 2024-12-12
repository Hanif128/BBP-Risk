document.addEventListener("DOMContentLoaded", () => {
    const mainContent = document.getElementById("main-content");
    const links = document.querySelectorAll('.nav-link');

    const loadPage = (url) => {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;

                // Update active link
                links.forEach(link => link.classList.remove('active'));
                document.querySelector(`[data-page="${url}"]`).classList.add('active');

                // Menampilkan form jika form-risk.php dimuat
                if (url === 'form-risk.php') {
                    const formPage = document.getElementById('form-page');
                    if (formPage) {
                        formPage.classList.remove('d-none');
                    }
                }
            })
            .catch(err => console.error('Failed to load page:', err));
    };

    // Initial load
    const defaultPage = 'dashboard.php';
    loadPage(defaultPage);

    // Handle navigation clicks
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const page = link.getAttribute('data-page');
            loadPage(page);
        });
    });

    const inherentLikelihood = document.getElementById("inherentLikelihood");
    const inherentImpact = document.getElementById("inherentImpact");
    const inherentRisk = document.getElementById("inherentRisk");

    const residualLikelihood = document.getElementById("residualLikelihood");
    const residualImpact = document.getElementById("residualImpact");
    const residualRisk = document.getElementById("residualRisk");

    const mitigasiLikelihood = document.getElementById("mitigasiLikelihood");
    const mitigasiImpact = document.getElementById("mitigasiImpact");
    const mitigasiRisk = document.getElementById("mitigasiRisk");

    // Function to calculate risk
    const calculateRisk = () => {
        // Inherent Risk
        inherentRisk.value = inherentLikelihood.value * inherentImpact.value;

        // Residual Risk
        residualRisk.value = residualLikelihood.value * residualImpact.value;

        // Mitigasi Risk
        mitigasiRisk.value = mitigasiLikelihood.value * mitigasiImpact.value;
    };

    // Add event listeners to update risk values on change
    inherentLikelihood.addEventListener("input", calculateRisk);
    inherentImpact.addEventListener("input", calculateRisk);

    residualLikelihood.addEventListener("input", calculateRisk);
    residualImpact.addEventListener("input", calculateRisk);

    mitigasiLikelihood.addEventListener("input", calculateRisk);
    mitigasiImpact.addEventListener("input", calculateRisk);
});
