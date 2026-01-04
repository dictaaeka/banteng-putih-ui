#!/bin/bash

# Setup script for test automation

echo "========================================="
echo "Desa Bantengputih Test Automation Setup"
echo "========================================="
echo ""

# Check Python installation
if ! command -v python3 &> /dev/null; then
    echo "❌ Python 3 is not installed. Please install Python 3.8 or higher."
    exit 1
fi

echo "✓ Python found: $(python3 --version)"
echo ""

# Create virtual environment
echo "Creating virtual environment..."
python3 -m venv venv
echo "✓ Virtual environment created"
echo ""

# Activate virtual environment
echo "Activating virtual environment..."
source venv/bin/activate
echo "✓ Virtual environment activated"
echo ""

# Upgrade pip
echo "Upgrading pip..."
pip install --upgrade pip
echo "✓ Pip upgraded"
echo ""

# Install dependencies
echo "Installing dependencies..."
pip install -r requirements.txt
echo "✓ Dependencies installed"
echo ""

# Create necessary directories
echo "Creating directories..."
mkdir -p reports
mkdir -p screenshots
echo "✓ Directories created"
echo ""

# Check if .env exists
if [ ! -f ".env" ]; then
    echo "⚠️  .env file not found. Please configure .env file."
else
    echo "✓ .env file found"
fi

echo ""
echo "========================================="
echo "Setup completed successfully!"
echo "========================================="
echo ""
echo "To run tests:"
echo "  1. Activate virtual environment: source venv/bin/activate"
echo "  2. Configure .env file with your settings"
echo "  3. Start Laravel application: cd .. && php artisan serve"
echo "  4. Run tests: pytest"
echo ""
