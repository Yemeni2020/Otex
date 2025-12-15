{{-- 
<div class="container mx-auto px-4 py-12">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 mb-2">Shop All</h1>
            <p class="text-slate-500">
                Explore our complete collection of automotive accessories
            </p>
        </div>

        <button class="h-10 px-4 rounded-md border text-sm flex items-center gap-2">
            Sort By
        </button>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Sidebar -->
        <aside class="w-full lg:w-64">
            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="font-bold mb-4">Categories</h3>

                <ul class="space-y-2 text-sm">
                    <li class="text-blue-600 font-semibold">All</li>
                    <li class="text-slate-600">Interior</li>
                    <li class="text-slate-600">Storage</li>
                    <li class="text-slate-600">Electronics</li>
                    <li class="text-slate-600">Car Care</li>
                    <li class="text-slate-600">Tools</li>
                </ul>
            </div>
        </aside>

        <!-- Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-1">

            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition">
                <img
                    src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80"
                    class="h-64 w-full object-cover rounded-t-xl"
                    alt=""
                >

                <div class="p-5 flex flex-col">
                    <h3 class="font-bold text-lg mb-2">
                        Premium Leather Seat Covers
                    </h3>

                    <p class="text-sm text-slate-600 mb-4 line-clamp-2">
                        Transform your car interior with premium leather seat covers.
                    </p>

                    <div class="flex justify-between items-center mt-auto">
                        <span class="text-xl font-bold text-blue-600">
                            $189.99
                        </span>

                        <button class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm hover:bg-blue-700">
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Duplicate card for more static products -->

        </div>
    </div>
</div>
@push('scripts')
    <script type="module">import { POPUP_STYLES } from "./plugins/visual-editor/visual-editor-config.js";

const PLUGIN_APPLY_EDIT_API_URL = "/api/apply-edit";

const ALLOWED_PARENT_ORIGINS = [
	"https://horizons.hostinger.com",
	"https://horizons.hostinger.dev",
	"https://horizons-frontend-local.hostinger.dev",
	"http://localhost:4000",
];

let disabledTooltipElement = null;
let currentDisabledHoverElement = null;

let translations = {
	disabledTooltipText: "This text can be changed only through chat.",
	disabledTooltipTextImage: "This image can only be changed through chat.",
};

let areStylesInjected = false;

let globalEventHandlers = null;

let currentEditingInfo = null;

function injectPopupStyles() {
	if (areStylesInjected) return;

	const styleElement = document.createElement("style");
	styleElement.id = "inline-editor-styles";
	styleElement.textContent = POPUP_STYLES;
	document.head.appendChild(styleElement);
	areStylesInjected = true;
}

function findEditableElementAtPoint(event) {
	let editableElement = event.target.closest("[data-edit-id]");

	if (editableElement) {
		return editableElement;
	}

	const elementsAtPoint = document.elementsFromPoint(
		event.clientX,
		event.clientY
	);

	const found = elementsAtPoint.find(
		(el) => el !== event.target && el.hasAttribute("data-edit-id")
	);
	if (found) return found;

	return null;
}

function findDisabledElementAtPoint(event) {
	const direct = event.target.closest("[data-edit-disabled]");
	if (direct) return direct;
	const elementsAtPoint = document.elementsFromPoint(
		event.clientX,
		event.clientY
	);
	const found = elementsAtPoint.find(
		(el) => el !== event.target && el.hasAttribute("data-edit-disabled")
	);
	if (found) return found;
	return null;
}

function showPopup(targetElement, editId, currentContent, isImage = false) {
	currentEditingInfo = { editId, targetElement };

	const parentOrigin = getParentOrigin();

	if (parentOrigin && ALLOWED_PARENT_ORIGINS.includes(parentOrigin)) {
		const eventType = isImage ? "imageEditEnter" : "editEnter";

		window.parent.postMessage(
			{
				type: eventType,
				payload: { currentText: currentContent },
			},
			parentOrigin
		);
	}
}

function handleGlobalEvent(event) {
	if (
		!document.getElementById("root")?.getAttribute("data-edit-mode-enabled")
	) {
		return;
	}

	// Don't handle if selection mode is active
	if (document.getElementById("root")?.getAttribute("data-selection-mode-enabled") === "true") {
		return;
	}

	if (event.target.closest("#inline-editor-popup")) {
		return;
	}

	const editableElement = findEditableElementAtPoint(event);

	if (editableElement) {
		event.preventDefault();
		event.stopPropagation();
		event.stopImmediatePropagation();

		if (event.type === "click") {
			const editId = editableElement.getAttribute("data-edit-id");
			if (!editId) {
				console.warn("[INLINE EDITOR] Clicked element missing data-edit-id");
				return;
			}

			const isImage = editableElement.tagName.toLowerCase() === "img";
			let currentContent = "";

			if (isImage) {
				currentContent = editableElement.getAttribute("src") || "";
			} else {
				currentContent = editableElement.textContent || "";
			}

			showPopup(editableElement, editId, currentContent, isImage);
		}
	} else {
		event.preventDefault();
		event.stopPropagation();
		event.stopImmediatePropagation();
	}
}

function getParentOrigin() {
	if (
		window.location.ancestorOrigins &&
		window.location.ancestorOrigins.length > 0
	) {
		return window.location.ancestorOrigins[0];
	}

	if (document.referrer) {
		try {
			return new URL(document.referrer).origin;
		} catch (e) {
			console.warn("Invalid referrer URL:", document.referrer);
		}
	}

	return null;
}

async function handleEditSave(updatedText) {
	const newText = updatedText
		// Replacing characters that cause Babel parser to crash
		.replace(/</g, "&lt;")
		.replace(/>/g, "&gt;")
		.replace(/{/g, "&#123;")
		.replace(/}/g, "&#125;");

	const { editId } = currentEditingInfo;

	try {
		const response = await fetch(PLUGIN_APPLY_EDIT_API_URL, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({
				editId: editId,
				newFullText: newText,
			}),
		});

		const result = await response.json();
		if (result.success) {
			const parentOrigin = getParentOrigin();
			if (parentOrigin && ALLOWED_PARENT_ORIGINS.includes(parentOrigin)) {
				window.parent.postMessage(
					{
						type: "editApplied",
						payload: {
							editId: editId,
							fileContent: result.newFileContent,
							beforeCode: result.beforeCode,
							afterCode: result.afterCode,
						},
					},
					parentOrigin
				);
			} else {
				console.error("Unauthorized parent origin:", parentOrigin);
			}
		} else {
			console.error(
				`[vite][visual-editor] Error saving changes: ${result.error}`
			);
		}
	} catch (error) {
		console.error(
			`[vite][visual-editor] Error during fetch for ${editId}:`,
			error
		);
	}
}

function createDisabledTooltip() {
	if (disabledTooltipElement) return;

	disabledTooltipElement = document.createElement("div");
	disabledTooltipElement.id = "inline-editor-disabled-tooltip";
	document.body.appendChild(disabledTooltipElement);
}

function showDisabledTooltip(targetElement, isImage = false) {
	if (!disabledTooltipElement) createDisabledTooltip();

	disabledTooltipElement.textContent = isImage
		? translations.disabledTooltipTextImage
		: translations.disabledTooltipText;

	if (!disabledTooltipElement.isConnected) {
		document.body.appendChild(disabledTooltipElement);
	}
	disabledTooltipElement.classList.add("tooltip-active");

	const tooltipWidth = disabledTooltipElement.offsetWidth;
	const tooltipHeight = disabledTooltipElement.offsetHeight;
	const rect = targetElement.getBoundingClientRect();

	// Ensures that tooltip is not off the screen with 5px margin
	let newLeft = rect.left + window.scrollX + rect.width / 2 - tooltipWidth / 2;
	let newTop = rect.bottom + window.scrollY + 5;

	if (newLeft < window.scrollX) {
		newLeft = window.scrollX + 5;
	}
	if (newLeft + tooltipWidth > window.innerWidth + window.scrollX) {
		newLeft = window.innerWidth + window.scrollX - tooltipWidth - 5;
	}
	if (newTop + tooltipHeight > window.innerHeight + window.scrollY) {
		newTop = rect.top + window.scrollY - tooltipHeight - 5;
	}
	if (newTop < window.scrollY) {
		newTop = window.scrollY + 5;
	}

	disabledTooltipElement.style.left = `${newLeft}px`;
	disabledTooltipElement.style.top = `${newTop}px`;
}

function hideDisabledTooltip() {
	if (disabledTooltipElement) {
		disabledTooltipElement.classList.remove("tooltip-active");
	}
}

function handleDisabledElementHover(event) {
	const isImage = event.currentTarget.tagName.toLowerCase() === "img";

	showDisabledTooltip(event.currentTarget, isImage);
}

function handleDisabledElementLeave() {
	hideDisabledTooltip();
}

function handleDisabledGlobalHover(event) {
	const disabledElement = findDisabledElementAtPoint(event);
	if (disabledElement) {
		if (currentDisabledHoverElement !== disabledElement) {
			currentDisabledHoverElement = disabledElement;
			const isImage = disabledElement.tagName.toLowerCase() === "img";
			showDisabledTooltip(disabledElement, isImage);
		}
	} else {
		if (currentDisabledHoverElement) {
			currentDisabledHoverElement = null;
			hideDisabledTooltip();
		}
	}
}

function enableEditMode() {
	// Don't enable if selection mode is active
	if (document.getElementById("root")?.getAttribute("data-selection-mode-enabled") === "true") {
		console.warn("[EDIT MODE] Cannot enable edit mode while selection mode is active");
		return;
	}

	document
		.getElementById("root")
		?.setAttribute("data-edit-mode-enabled", "true");

	injectPopupStyles();

	if (!globalEventHandlers) {
		globalEventHandlers = {
			mousedown: handleGlobalEvent,
			pointerdown: handleGlobalEvent,
			click: handleGlobalEvent,
		};

		Object.entries(globalEventHandlers).forEach(([eventType, handler]) => {
			document.addEventListener(eventType, handler, true);
		});
	}

	document.addEventListener("mousemove", handleDisabledGlobalHover, true);

	document.querySelectorAll("[data-edit-disabled]").forEach((el) => {
		el.removeEventListener("mouseenter", handleDisabledElementHover);
		el.addEventListener("mouseenter", handleDisabledElementHover);
		el.removeEventListener("mouseleave", handleDisabledElementLeave);
		el.addEventListener("mouseleave", handleDisabledElementLeave);
	});
}

function disableEditMode() {
	document.getElementById("root")?.removeAttribute("data-edit-mode-enabled");

	hideDisabledTooltip();

	if (globalEventHandlers) {
		Object.entries(globalEventHandlers).forEach(([eventType, handler]) => {
			document.removeEventListener(eventType, handler, true);
		});
		globalEventHandlers = null;
	}

	document.removeEventListener("mousemove", handleDisabledGlobalHover, true);
	currentDisabledHoverElement = null;

	document.querySelectorAll("[data-edit-disabled]").forEach((el) => {
		el.removeEventListener("mouseenter", handleDisabledElementHover);
		el.removeEventListener("mouseleave", handleDisabledElementLeave);
	});
}

window.addEventListener("message", function (event) {
	if (event.data?.type === "edit-save") {
		handleEditSave(event.data?.payload?.newText);
	}
	if (event.data?.type === "enable-edit-mode") {
		if (event.data?.translations) {
			translations = { ...translations, ...event.data.translations };
		}

		enableEditMode();
	}
	if (event.data?.type === "disable-edit-mode") {
		disableEditMode();
	}
});
</script>
<script type="module">const ALLOWED_PARENT_ORIGINS = [
	'https://horizons.hostinger.com',
	'https://horizons.hostinger.dev',
	'https://horizons-frontend-local.hostinger.dev',
	'http://localhost:4000',
];

const IMPORTANT_STYLES = [
	'display',
	'position',
	'flex-direction',
	'justify-content',
	'align-items',
	'width',
	'height',
	'padding',
	'margin',
	'border',
	'background-color',
	'color',
	'font-size',
	'font-weight',
	'font-family',
	'border-radius',
	'box-shadow',
	'gap',
	'grid-template-columns',
];

const PRIMARY_400_COLOR = '#7B68EE';
const TEXT_CONTEXT_MAX_LENGTH = 500;
const DATA_SELECTION_MODE_ENABLED_ATTRIBUTE = 'data-selection-mode-enabled';
const MESSAGE_TYPE_ENABLE_SELECTION_MODE = 'enableSelectionMode';
const MESSAGE_TYPE_DISABLE_SELECTION_MODE = 'disableSelectionMode';

let selectionModeEnabled = false;
let currentHoverElement = null;
let overlayDiv = null;
let selectedOverlayDiv = null;
let selectedElement = null;


function injectStyles() {
	if (document.getElementById('selection-mode-styles')) {
		return;
	}

	const style = document.createElement('style');
	style.id = 'selection-mode-styles';
	style.textContent = `
		#selection-mode-overlay {
			position: absolute;
			border: 2px dashed ${PRIMARY_400_COLOR};
			pointer-events: none;
			z-index: 999999;
		}
		#selection-mode-selected-overlay {
			position: absolute;
			border: 3px solid ${PRIMARY_400_COLOR};
			pointer-events: none;
			z-index: 999998;
		}
	`;
	document.head.appendChild(style);
}

function getParentOrigin() {
	if (
		window.location.ancestorOrigins
		&& window.location.ancestorOrigins.length > 0
	) {
		return window.location.ancestorOrigins[0];
	}

	if (document.referrer) {
		try {
			return new URL(document.referrer).origin;
		} catch {
			console.warn('[SELECTION MODE] Invalid referrer URL:', document.referrer);
		}
	}

	return null;
}

/**
 * Extract file path from React Fiber metadata (simplified - only for filePath)
 * @param {*} node - DOM node
 * @returns {string|null} - File path if found, null otherwise
 */
function getFilePathFromNode(node) {
	const fiberKey = Object.keys(node).find(k => k.startsWith('__reactFiber'));
	if (!fiberKey) {
		return null;
	}

	const fiber = node[fiberKey];
	if (!fiber) {
		return null;
	}

	// Traverse up the fiber tree to find source metadata
	let currentFiber = fiber;
	while (currentFiber) {
		const source = currentFiber._debugSource
			|| currentFiber.memoizedProps?.__source
			|| currentFiber.pendingProps?.__source;

		if (source?.fileName) {
			return source.fileName;
		}

		currentFiber = currentFiber.return;
	}

	return null;
}

/**
 * Generate a CSS selector path to uniquely identify the element
 * @param {*} element
 * @returns {string} CSS selector path
 */
function getPathToElement(element) {
	const path = [];
	let current = element;
	let depth = 0;
	const maxDepth = 20; // Prevent infinite loops

	while (current && current.nodeType === Node.ELEMENT_NODE && depth < maxDepth) {
		let selector = current.nodeName.toLowerCase();

		if (current.id) {
			selector += `#${current.id}`;
			path.unshift(selector);
			break; // ID is unique, stop here
		}

		if (current.className && typeof current.className === 'string') {
			const classes = current.className.trim().split(/\s+/).filter(c => c.length > 0);
			if (classes.length > 0) {
				selector += `.${classes.join('.')}`;
			}
		}

		if (current.parentElement) {
			const siblings = Array.from(current.parentElement.children);
			const sameTypeSiblings = siblings.filter(s => s.nodeName === current.nodeName);
			if (sameTypeSiblings.length > 1) {
				const index = sameTypeSiblings.indexOf(current) + 1;
				selector += `:nth-of-type(${index})`;
			}
		}

		path.unshift(selector);
		current = current.parentElement;
		depth++;
	}

	return path.join(' > ');
}

function getComputedStyles(element) {
	const computedStyles = window.getComputedStyle(element);
	
	return Object.fromEntries(IMPORTANT_STYLES.map((style) => {
		const styleValue = computedStyles.getPropertyValue(style)?.trim();

		return styleValue && styleValue !== 'none' && styleValue !== 'normal'
			? [style, styleValue]
			: null;
	})
	.filter(Boolean));
}

function extractDOMContext(element) {
	if (!element) {
		return null;
	}

	const textContent = element.textContent?.trim();

	return {
		outerHTML: element.outerHTML,
		selector: getPathToElement(element),
		attributes: (element.attributes && element.attributes.length > 0) 
		? Object.fromEntries(Array.from(element.attributes).map((attr) => [attr.name, attr.value]))
			: {},
		computedStyles: getComputedStyles(element),
		textContent: (textContent && textContent.length > 0 && textContent.length < TEXT_CONTEXT_MAX_LENGTH)
			? element.textContent?.trim()
			: null
	};
}

function createOverlay() {
	if (overlayDiv) {
		return;
	}

	injectStyles();

	overlayDiv = document.createElement('div');
	overlayDiv.id = 'selection-mode-overlay';
	document.body.appendChild(overlayDiv);
}

function createSelectedOverlay() {
	if (selectedOverlayDiv) {
		return;
	}

	injectStyles();

	selectedOverlayDiv = document.createElement('div');
	selectedOverlayDiv.id = 'selection-mode-selected-overlay';
	document.body.appendChild(selectedOverlayDiv);
}

function removeOverlay() {
	if (overlayDiv && overlayDiv.parentNode) {
		overlayDiv.parentNode.removeChild(overlayDiv);
		overlayDiv = null;
	}
	if (selectedOverlayDiv && selectedOverlayDiv.parentNode) {
		selectedOverlayDiv.parentNode.removeChild(selectedOverlayDiv);
		selectedOverlayDiv = null;
	}
}

function showOverlay(element) {
	if (!overlayDiv) {
		createOverlay();
	}

	const rect = element.getBoundingClientRect();
	overlayDiv.style.left = `${rect.left + window.scrollX}px`;
	overlayDiv.style.top = `${rect.top + window.scrollY}px`;
	overlayDiv.style.width = `${rect.width}px`;
	overlayDiv.style.height = `${rect.height}px`;
	overlayDiv.style.display = 'block';
}

function showSelectedOverlay(element) {
	if (!selectedOverlayDiv) {
		createSelectedOverlay();
	}

	const rect = element.getBoundingClientRect();
	selectedOverlayDiv.style.left = `${rect.left + window.scrollX}px`;
	selectedOverlayDiv.style.top = `${rect.top + window.scrollY}px`;
	selectedOverlayDiv.style.width = `${rect.width}px`;
	selectedOverlayDiv.style.height = `${rect.height}px`;
	selectedOverlayDiv.style.display = 'block';
}

function hideOverlay() {
	if (overlayDiv) {
		overlayDiv.style.display = 'none';
	}
}

function handleMouseMove(event) {
	if (!selectionModeEnabled) {
		return;
	}

	const element = document.elementFromPoint(event.clientX, event.clientY);
	if (!element) {
		hideOverlay();
		currentHoverElement = null;
		return;
	}

	if (element === overlayDiv || element === selectedOverlayDiv) {
		return;
	}

	// Only update if we're hovering a different element
	if (currentHoverElement !== element) {
		currentHoverElement = element;

		// Show outline on the element
		showOverlay(element);
	}
}

function handleTouchStart(event) {
	if (!selectionModeEnabled) {
		return;
	}

	const touch = event.touches[0];
	if (!touch) {
		return;
	}

	const element = document.elementFromPoint(touch.clientX, touch.clientY);
	if (!element) {
		currentHoverElement = null;
		return;
	}

	if (element === overlayDiv || element === selectedOverlayDiv) {
		return;
	}

	currentHoverElement = element;

	showOverlay(element);
}

function stripFilePath(filePath) {
	if (!filePath) {
		return filePath;
	}

	const publicHtmlIndex = filePath.indexOf('public_html/');
	if (publicHtmlIndex !== -1) {
		return filePath.substring(publicHtmlIndex + 'public_html/'.length);
	}

	return filePath;
}

function handleClick(event) {
	if (!selectionModeEnabled) {
		return;
	}

	if (!currentHoverElement) {
		const element = document.elementFromPoint(event.clientX, event.clientY);

		if (!element || element === overlayDiv || element === selectedOverlayDiv) {
			return;
		}

		currentHoverElement = element;
	}

	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();

	const domContext = extractDOMContext(currentHoverElement);

	if (!domContext) {
		return;
	}

	selectedElement = currentHoverElement;
	if (selectedElement) {
		showSelectedOverlay(selectedElement);
	}

	// Extract file path from React Fiber (if available)
	const filePath = getFilePathFromNode(currentHoverElement);
	const strippedFilePath = filePath ? stripFilePath(filePath) : undefined;

	// Send domContext and filePath to parent window
	const parentOrigin = getParentOrigin();
	if (parentOrigin && ALLOWED_PARENT_ORIGINS.includes(parentOrigin)) {
		window.parent.postMessage(
			{
				type: 'elementSelected',
				payload: {
					filePath: strippedFilePath,
					domContext,
				},
			},
			parentOrigin,
		);
	}
}

function handleMouseLeave() {
	if (!selectionModeEnabled) {
		return;
	}

	hideOverlay();
	currentHoverElement = null;
}

function enableSelectionMode() {
	if (selectionModeEnabled) {
		return;
	}

	selectionModeEnabled = true;
	document.getElementById('root')?.setAttribute(DATA_SELECTION_MODE_ENABLED_ATTRIBUTE, 'true');

	document.body.style.userSelect = 'none';

	createOverlay();
	document.addEventListener('mousemove', handleMouseMove, true);
	document.addEventListener('touchstart', handleTouchStart, true);
	document.addEventListener('click', handleClick, true);
	document.addEventListener('mouseleave', handleMouseLeave, true);
}

function disableSelectionMode() {
	if (!selectionModeEnabled) {
		return;
	}

	selectionModeEnabled = false;
	document.getElementById('root')?.removeAttribute(DATA_SELECTION_MODE_ENABLED_ATTRIBUTE);

	document.body.style.userSelect = '';

	hideOverlay();
	removeOverlay();
	currentHoverElement = null;
	selectedElement = null;

	document.removeEventListener('mousemove', handleMouseMove, true);
	document.removeEventListener('touchstart', handleTouchStart, true);
	document.removeEventListener('click', handleClick, true);
	document.removeEventListener('mouseleave', handleMouseLeave, true);
}

window.addEventListener('message', (event) => {
	if (event.data?.type === MESSAGE_TYPE_ENABLE_SELECTION_MODE) {
		enableSelectionMode();
	}
	if (event.data?.type === MESSAGE_TYPE_DISABLE_SELECTION_MODE) {
		disableSelectionMode();
	}
});
</script>
@endpush --}}
<!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 mb-2">Shop All</h1>
            <p class="text-slate-500">
                Explore our complete collection of automotive accessories
            </p>
        </div>

        <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-sm">
            Sort By
        </button>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Sidebar -->
        <aside class="w-full lg:w-64 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="font-bold mb-4">Categories</h3>

                <ul class="space-y-2 text-sm">
                    <li class="text-blue-600 font-semibold">All</li>
                    <li class="text-slate-600">Interior</li>
                    <li class="text-slate-600">Storage</li>
                    <li class="text-slate-600">Electronics</li>
                    <li class="text-slate-600">Car Care</li>
                    <li class="text-slate-600">Tools</li>
                </ul>
            </div>
        </aside>

        <!-- Products Grid -->
        <section class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Product Card -->
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition flex flex-col">
                <img
                    src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80"
                    class="h-64 w-full object-cover rounded-t-xl"
                    alt="Product"
                >

                <div class="p-5 flex flex-col flex-1">
                    <h3 class="font-bold text-lg mb-2">
                        Premium Leather Seat Covers
                    </h3>

                    <p class="text-sm text-slate-600 mb-4 flex-grow">
                        Transform your car interior with premium leather.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-bold text-xl">$189.99</span>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm">
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Duplicate cards manually for now -->

        </section>

    </div>