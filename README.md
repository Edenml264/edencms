# 🌟 EdenCMS/WebFácil

EdenCMS/WebFácil es un sistema de gestión de contenido (CMS) moderno y fácil de usar, diseñado especialmente para empresas de servicios y productos que buscan tener una presencia en línea profesional sin complicaciones.

## 🎯 Características Principales

- 🎨 **Constructor Visual**
  - Interfaz drag & drop intuitiva
  - Componentes prediseñados
  - Personalización en tiempo real
  - Plantillas responsivas

- 📊 **Panel de Control**
  - Dashboard personalizable
  - Gestión de páginas
  - Biblioteca de medios
  - Configuraciones centralizadas

- 🖼️ **Gestión de Medios**
  - Biblioteca centralizada
  - Optimización automática
  - Organización en carpetas
  - Vista previa y edición

## 🛠️ Tecnologías Utilizadas

- **Backend**:
  - PHP 8.3.14
  - Laravel 11.36.1
  - SQLite (desarrollo)

- **Frontend**:
  - Blade Templates
  - Tailwind CSS 3.x
  - Alpine.js 3.x
  - FilePond (gestión de archivos)
  - TinyMCE (editor WYSIWYG)

## 📋 Requisitos

- PHP >= 8.3.14
- Composer
- Node.js y npm
- SQLite (para desarrollo)

## 🚀 Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Edenml264/edencms.git
cd edencms
```

2. Instalar dependencias PHP:
```bash
composer install
```

3. Instalar dependencias JavaScript:
```bash
npm install
```

4. Configurar el entorno:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurar la base de datos:
```bash
touch database/database.sqlite
php artisan migrate
```

6. Compilar assets:
```bash
npm run dev
```

7. Iniciar el servidor:
```bash
php artisan serve
```

## 📝 Estado del Proyecto

El proyecto se encuentra actualmente en desarrollo activo, con las siguientes fases:

✅ **Fase 1: Configuración Inicial y Autenticación** (Completado)
- Configuración del proyecto Laravel
- Implementación de autenticación con Laravel Breeze
- Estructura base del CMS

🚧 **Fase 2: Panel de Administración** (En Progreso)
- Dashboard administrativo ✅
- CRUD de páginas ✅
- Gestión de medios 🔄
- Editor de contenido ⏳

⏳ **Próximas Fases**:
- Frontend y Plantillas
- Optimizaciones y Características Adicionales
- Sistema de Roles y Permisos

## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor, lee nuestras guías de contribución antes de enviar un pull request.

## 📄 Licencia

Este proyecto está licenciado bajo la Licencia MIT - vea el archivo [LICENSE](LICENSE) para más detalles.

## 👥 Autores

- Eden Mendez - Desarrollador Principal
