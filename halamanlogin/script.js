// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach(item=> {
	const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

		if(!this.classList.contains('active')) {
			allDropdown.forEach(i=> {
				const aLink = i.parentElement.querySelector('a:first-child');

				aLink.classList.remove('active');
				i.classList.remove('show');
			})
		}

		this.classList.toggle('active');
		item.classList.toggle('show');
	})
})





// SIDEBAR COLLAPSE
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const allSideDivider = document.querySelectorAll('#sidebar .divider');

if(sidebar.classList.contains('hide')) {
	allSideDivider.forEach(item=> {
		item.textContent = '-'
	})
	allDropdown.forEach(item=> {
		const a = item.parentElement.querySelector('a:first-child');
		a.classList.remove('active');
		item.classList.remove('show');
	})
} else {
	allSideDivider.forEach(item=> {
		item.textContent = item.dataset.text;
	})
}

toggleSidebar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})

		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
	} else {
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




sidebar.addEventListener('mouseleave', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})
	}
})



sidebar.addEventListener('mouseenter', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})




// MENU
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach(item=> {
	const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
	})
})



window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
		const menuLink = item.querySelector('.menu-link');

		if(e.target !== icon) {
			if(e.target !== menuLink) {
				if (menuLink.classList.contains('show')) {
					menuLink.classList.remove('show')
				}
			}
		}
	})
})





// PROGRESSBAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=> {
	item.style.setProperty('--value', item.dataset.value)
})






// APEXCHART
var options = {
  series: [{
  name: 'series1',
  data: [31, 40, 28, 51, 42, 109, 100]
}, {
  name: 'series2',
  data: [11, 32, 45, 32, 34, 52, 41]
}],
  chart: {
  height: 350,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
  x: {
    format: 'dd/MM/yy HH:mm'
  },
},
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// document.addEventListener("DOMContentLoaded", () => {
//     const mainContent = document.getElementById("main-content");
//     const links = document.querySelectorAll('.nav-link');

//     const loadPage = (url) => {
//         fetch(url)
//             .then(response => response.text())
//             .then(html => {
//                 mainContent.innerHTML = html;

//                 // Update active link
//                 links.forEach(link => link.classList.remove('active'));
//                 document.querySelector(`[data-page="${url}"]`).classList.add('active');

//                 // Menampilkan form jika form-risk.php dimuat
//                 if (url === 'form-risk.php') {
//                     const formPage = document.getElementById('form-page');
//                     if (formPage) {
//                         formPage.classList.remove('d-none');
//                     }
//                 }
//             })
//             .catch(err => console.error('Failed to load page:', err));
//     };


//     // Handle navigation clicks
//     links.forEach(link => {
//         link.addEventListener('click', (e) => {
//             e.preventDefault();
//             const page = link.getAttribute('data-page');
//             loadPage(page);
//         });
//     });

//     const inherentLikelihood = document.getElementById("inherentLikelihood");
//     const inherentImpact = document.getElementById("inherentImpact");
//     const inherentRisk = document.getElementById("inherentRisk");

//     const residualLikelihood = document.getElementById("residualLikelihood");
//     const residualImpact = document.getElementById("residualImpact");
//     const residualRisk = document.getElementById("residualRisk");

//     const mitigasiLikelihood = document.getElementById("mitigasiLikelihood");
//     const mitigasiImpact = document.getElementById("mitigasiImpact");
//     const mitigasiRisk = document.getElementById("mitigasiRisk");

//     // Function to calculate risk
//     const calculateRisk = () => {
//         // Inherent Risk
//         inherentRisk.value = inherentLikelihood.value * inherentImpact.value;

//         // Residual Risk
//         residualRisk.value = residualLikelihood.value * residualImpact.value;

//         // Mitigasi Risk
//         mitigasiRisk.value = mitigasiLikelihood.value * mitigasiImpact.value;
//     };

//     // Add event listeners to update risk values on change
//     inherentLikelihood.addEventListener("input", calculateRisk);
//     inherentImpact.addEventListener("input", calculateRisk);

//     residualLikelihood.addEventListener("input", calculateRisk);
//     residualImpact.addEventListener("input", calculateRisk);

//     mitigasiLikelihood.addEventListener("input", calculateRisk);
//     mitigasiImpact.addEventListener("input", calculateRisk);
// });
