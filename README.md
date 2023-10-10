```markdown
# Didattic@

Didattic@ is a web application developed using the Laravel framework for the backend and React for the frontend, with the aim of providing a comprehensive resource for learning and effectively utilizing digital tools in education. The application offers guides and resources organized based on the type of educational activity teachers intend to perform, making it easier to choose the most suitable tools.

The website is hosted on [suffp-didattica.com](https://suffp-didattica.com/).

## Features

- **Comprehensive Guide**: A variety of detailed guides for using digital tools for education.
- **Intuitive Organization**: Resources are intuitively organized based on the type of educational activity, making it simple for teachers to find what they need.
- **Graphical Representation**: Utilizes the Nivo-chord library to provide intuitive graphical representations of the correlations between different tools and educational activities.

## Technologies Used

- **Backend**: Laravel
- **Frontend**: React
- **Graphic Library**: Nivo-chord

## Installation and Configuration

Ensure that you have the latest versions of Laravel, React, and the Nivo-chord library installed on your machine.

1. Clone the repository:
```bash
git clone https://github.com/your-username/didattica.git
```

2. Change into the directory:
```bash
cd didattica
```

3. Install the dependencies:
```bash
composer install
npm install
```

4. Copy the `.env.example` file to create a `.env` file and update the environment variables accordingly.
```bash
cp .env.example .env
```

5. Generate the application key:
```bash
php artisan key:generate
```

6. Run the migrations and seed the database (if necessary):
```bash
php artisan migrate --seed
```

7. Compile the assets:
```bash
npm run dev
```

8. Start the Laravel development server:
```bash
php artisan serve
```

Now, you should be able to access the application at [http://localhost:8000](http://localhost:8000).

## Contributing

If you have suggestions for how Didattic@ could be improved, or want to report a bug, open an issue! We'd appreciate any feedback.

## License

```
