<script>
    class EmbeddedWebview extends HTMLElement {
        connectedCallback() {
            const shadow = this.attachShadow({
                mode: 'closed'
            });
            shadow.innerHTML = '{{ $slot }}'
        }
    }

    window.customElements.define('embedded-webview', EmbeddedWebview);
</script>

<embedded-webview />
