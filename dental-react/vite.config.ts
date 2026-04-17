import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import { copyFileSync, readdirSync, statSync } from 'fs';
import { join } from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    react(),
    {
      name: 'copy-public-filtered',
      apply: 'build',
      enforce: 'post',
      closeBundle() {
        const publicDir = 'public';
        const outDir = 'dist';
        try {
          const files = readdirSync(publicDir);
          files.forEach(file => {
            if (!file.includes('copy')) {
              const src = join(publicDir, file);
              const dest = join(outDir, file);
              if (statSync(src).isFile()) {
                try {
                  copyFileSync(src, dest);
                } catch (err) {
                  console.warn(`Could not copy ${file}`);
                }
              }
            }
          });
        } catch (err) {
          console.warn('Error copying public files');
        }
      }
    }
  ],
  optimizeDeps: {
    exclude: ['lucide-react'],
  },
  build: {
    copyPublicDir: false
  }
});
