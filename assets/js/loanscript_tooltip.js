class Slider {
	constructor(rangeElement, valueElement, emiElement, tooltipElement, options) {
		this.rangeElement = rangeElement
		this.valueElement = valueElement
		this.emiElement = emiElement
		this.tooltipElement = tooltipElement
		this.options = options

		this.rangeElement.addEventListener('input', this.updateSlider.bind(this))
	}

	init() {
		this.rangeElement.min = this.options.min
		this.rangeElement.max = this.options.max
		this.rangeElement.value = this.options.cur
		this.updateSlider()
	}

	asMoney(value) {
		return '₹' + parseFloat(value).toLocaleString('en-IN')
	}

	generateBackground(value) {
		let percentage = (value - this.options.min) / (this.options.max - this.options.min) * 100
		return `background: linear-gradient(to right, #1c5296, #1c5296 ${percentage}%, #f1f1f1 ${percentage}%)`
		//return `background: linear-gradient(to right, rgb(4 106 59), rgb(161 199 182) ${percentage}%, rgb(241, 241, 241) ${percentage}%);`
	}

	

	updateSlider() {
		let val = this.rangeElement.value
		this.valueElement.innerHTML = this.asMoney(val)
		this.rangeElement.style = this.generateBackground(val)

		// Update tooltip text
		this.tooltipElement.innerHTML = this.asMoney(val)

		// Calculate thumb position
		let rangeWidth = this.rangeElement.offsetWidth
		let min = this.options.min
		let max = this.options.max
		let percent = (val - min) / (max - min)
		let thumbOffset = percent * rangeWidth

		// Move tooltip (centered over thumb)
		this.tooltipElement.style.left = `${thumbOffset}px`

		// EMI Calculation
		let j = Math.abs(val)
		let v = Math.abs(11.5 / 12 / 100)
		let Q = 72
		let amt = Math.pow(1 + v, Q) / (Math.pow(1 + v, Q) - 1) * v * j
		this.emiElement.innerHTML = this.asMoney(Math.round(amt))
	}
}

// Initialize the slider on DOMContentLoaded
document.addEventListener('DOMContentLoaded', function () {
	let rangeElement = document.querySelector('input[type="range"]')
	let valueElement = document.querySelector('.range__value span')
	let emiElement = document.querySelector('.range__emi span') || { innerHTML: '' } // optional
	let tooltipElement = document.getElementById('rangeTooltip')

	if (rangeElement && tooltipElement) {
		let slider = new Slider(rangeElement, valueElement, emiElement, tooltipElement, {
			min: 50000,
			max: 1000000,
			cur: 590000
		})
		slider.init()
	}
})
