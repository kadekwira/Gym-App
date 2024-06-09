const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbotCloseBtn = document.querySelector(".close-btn");

let userMessage;

const prompts = [
    ["Kelas apa saja yang ditawarkan", "Apakah ada trainer yang tersedia", "Fasilitas apa yang ditawarkan"],
    ["Apakah ada program kebugaran", "Bagaimana proses mendaftar", "Berapa biaya untuk menggunakan kelas gym"],
    ["Bagaimana proses pembatalan sewa gym", "Apakah terdapat paket untuk menjadi member"]
];

const replies = [
    [
        "Kami menawarkan berbagai jenis kelas, termasuk yoga, pilates, kelas kekuatan, kardio, dan banyak lagi.",
        "Ya, kami memiliki trainer pribadi yang tersedia untuk membantu Anda mencapai tujuan kebugaran Anda.",
        "Fasilitas kami mencakup peralatan fitness lengkap, kolam renang, lapangan olahraga, sauna, dan kafetaria."
    ],
    [
        "Kami menawarkan berbagai program kebugaran seperti penurunan berat badan, pembentukan otot, dan kebugaran umum.",
        "Anda dapat mendaftar secara langsung di gym kami atau melalui situs web kami. Paket keanggotaan tersedia untuk berbagai kebutuhan.",
        "Biaya untuk menggunakan kelas gym bervariasi tergantung pada jenis kelas dan paket keanggotaan yang Anda pilih."
    ],
    [
        "Anda dapat membatalkan sewa gym dengan menghubungi layanan pelanggan kami atau secara langsung datang ke gym.",
        "Kami menawarkan berbagai paket keanggotaan dengan fleksibilitas pembatalan yang berbeda-beda. Silakan hubungi kami untuk informasi lebih lanjut."
    ]
];

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi;
}

const handleChat = () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;
    chatInput.value = "";

    const outgoingMessage = createChatLi(userMessage, "outgoing");
    chatbox.appendChild(outgoingMessage);
    chatbox.scrollTo(0, chatbox.scrollHeight);

    const waitingMessage = createChatLi("Harap tunggu...", "incoming");
    chatbox.appendChild(waitingMessage);
    chatbox.scrollTo(0, chatbox.scrollHeight);

    let botResponse = "";

    for (let i = 0; i < prompts.length; i++) {
        if (prompts[i].includes(userMessage)) {
            const userMessageIndex = prompts[i].indexOf(userMessage);
            if (userMessageIndex !== -1 && userMessageIndex < replies[i].length) {
                botResponse = replies[i][userMessageIndex];
            }
            break;
        }
    }

    setTimeout(() => {
        waitingMessage.remove();
        chatbox.appendChild(createChatLi(botResponse, "incoming"));
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }, 1500);
}

sendChatBtn.addEventListener("click", handleChat);
chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
