### 🚀 Livewire Blog App – Real-Time Performance Demo

A real-time blog application built with the **TALL Stack** (Tailwind, Alpine.js, Laravel, Livewire) to demonstrate that **Livewire is not slow — if used correctly**.

This app showcases how powerful and performant Livewire can be when combined with smart design decisions and tools like Pusher for real-time updates.

---

### 🔥 Features

- ✅ **Infinite Scroll** – Load posts smoothly without page reloads
- ✅ **Real-Time Updates** – New & edited posts appear live across all users using **Pusher WebSocket**
- ✅ **Authorization** – Only post owners can edit or delete their own posts
- ✅ **Live Like Counter** – Likes are synced in real time across all connected users
- ✅ **Livewire-Powered UI** – No custom JavaScript needed for most interactions

---

### 💡 Why This Project?

There’s a common misconception that **Livewire is slow**. This demo proves otherwise by showing a fully interactive, real-time web app built entirely with Livewire — no React, Vue, or complex frontend frameworks required.

The key? Understanding how Livewire handles state, optimizes rendering, and communicates efficiently with the backend.

---

### 🛠️ Tech Stack

| Tool       | Purpose                        |
|------------|--------------------------------|
| Laravel    | Backend framework              |
| Livewire   | Frontend interactivity         |
| TailwindCSS| Utility-first CSS styling      |
| Alpine.js  | Lightweight JS behavior        |
| Pusher     | Real-time communication        |
| SQLITE     | Database                       |

---

### 📦 Installation

1. **Clone the repo:**
```bash
git clone https://github.com/EslamKamel89/SocialX.git
```

2. **Install dependencies:**
```bash
composer install
npm install && npm run dev
```

3. **Create `.env` file and generate key:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup Pusher:**

- Create an account at [Pusher](https://pusher.com/)
- Add your credentials to `.env`
```env
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=mt1
```

5. **Run migrations:**
```bash
php artisan migrate --seed
```

6. **Start the dev server:**
```bash
php artisan serve
```

---

### 🌟 Support the Project

If you found this project helpful or interesting:

⭐ **Star the repo** – it really helps!

📬 **Have questions or suggestions?** Feel free to open an issue or reach out!

---

### 🤝 Contributions

Contributions, issues, and feature requests are welcome!  
Feel free to check the [issues page](https://github.com/EslamKamel89/SocialX) if you'd like to help improve this project.

---

### 📢 Author

👤 **Eslam Kamel**  
🔗 [LinkedIn](https://www.linkedin.com/in/eslamkamel89/) | [GitHub](https://github.com/EslamKamel89)

---

### 📜 License

MIT © [Eslam Kamel]

---
