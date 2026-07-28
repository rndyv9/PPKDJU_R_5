<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Spinning Donut</title>
    <style>
        /* Remove default margins and hide scrollbars */
        body {
            margin: 0;
            overflow: hidden;
            background-color: #adadad; /* Dark background to make the 3D pop */
        }
    </style>
</head>
<body>

    <!-- 1. Call the Three.js library from a site (CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

    <script>
        // 2. Set up the 3D World (Scene, Camera, and Renderer)
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true }); // antialias makes it smooth
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // 3. Create the 3D Donut (Torus)
        // TorusGeometry(radius, tube thickness, radial segments, tubular segments)
        const geometry = new THREE.TorusGeometry(1, 0.4, 16, 100);
        // const geometry = new THREE.IcosahedronGeometry(1, 0);

        // MeshNormalMaterial is a "cheat code" material. It automatically calculates
        // cool 3D rainbow shading without you having to set up complex lights!
        const material = new THREE.MeshNormalMaterial();
        // const material = new THREE.MeshStandardMaterial({ color: 0xff69b4 });

        const donut = new THREE.Mesh(geometry, material);
        scene.add(donut);

        // Move the camera back a little bit so we can see the donut
        camera.position.z = 3;
        const diagonalAxis = new THREE.Vector3(1, 1, 0).normalize();

        // 4. The Animation Loop
        function animate() {
            requestAnimationFrame(animate); // Tells the browser to update the frame
            donut.rotation.x += 0.02;
            donut.rotation.y += 0.02;
            // donut.rotation.z += 0.02;
            // donut.rotateOnWorldAxis(diagonalAxis, 0.02); // 0.02 is the speed

            // Render the scene
            renderer.render(scene, camera);
        }

        // Start the animation!
        animate();

        // 5. Make it responsive (if you resize the browser window)
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>

</body>
</html>
