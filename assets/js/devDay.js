document.addEventListener("DOMContentLoaded", () => {
	const output = document.getElementById("output");
	const videoWindow = document.getElementById("video-window");
	const programmerVideo = document.getElementById("programmer-video");
	
	function delay(ms) {
		return new Promise(resolve => setTimeout(resolve, ms));
	}
	
	function isProgrammerDay() {
		const today = new Date();
		const start = new Date(today.getFullYear(), 0, 0);
		const diff = today - start;
		const oneDay = 1000 * 60 * 60 * 24;
		const dayOfYear = Math.floor(diff / oneDay);
		return dayOfYear === 256;
	}
	
	async function showStartupSequence() {
		output.textContent = "skalm:~$ |\n";
		await delay(900);
		output.textContent = "skalm:~$";
		await delay(900);
		output.textContent = "skalm:~$ |\n";
		await delay(900);
		output.textContent = "skalm:~$";
		await delay(900);
		output.textContent = "skalm:~$ |\n";
		await delay(900);
		output.textContent = "skalm:~$";
		await delay(800);
		output.textContent = "skalm:~$ ./\n";
		await delay(700);
		output.textContent = "skalm:~$ ./he\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heim\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall 25\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall 256Es\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall 256Espe\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall 256Especi\n";
		await delay(700);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial |\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial |\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n";
		await delay(3000);
		output.textContent += "Validating system date\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date .\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date ..\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date ...\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date .\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date ..\n";
		await delay(800);
		output.textContent = "skalm:~$ ./heimdall 256Especial \n" +
			"Validating system date ...\n";
		await delay(1000);
		
		if (isProgrammerDay()) {
			output.textContent += "Day 256 detected.\nDecoding message\n";
			await delay(2000);
			output.textContent += "Collecting spleeter\n" +
				"  Using cached spleeter-2.1.0-py3-none-any.whl.metadata (10 kB)\n" +
				"Collecting ffmpeg-python==0.2.0 (from spleeter)\n" +
				"  Using cached ffmpeg_python-0.2.0-py3-none-any.whl.metadata (1.7 kB)\n" +
				"Collecting httpx<0.17.0,>=0.16.1 (from httpx[http2]<0.17.0,>=0.16.1->spleeter)\n" +
				"  Using cached httpx-0.16.1-py3-none-any.whl.metadata (38 kB)\n" +
				"Collecting librosa==0.8.0 (from spleeter)\n" +
				"  Using cached librosa-0.8.0.tar.gz (183 kB)\n" +
				"  Preparing metadata (setup.py) ... done\n" +
				"Collecting norbert==0.2.1 (from spleeter)\n" +
				"  Using cached norbert-0.2.1-py2.py3-none-any.whl.metadata (3.8 kB)\n" +
				"Collecting numpy<1.19.0,>=1.16.0 (from spleeter)\n" +
				"  Using cached numpy-1.18.5.zip (5.4 MB)\n" +
				"  Installing build dependencies ... done\n" +
				await delay(800);
			output.textContent = "Validating system date...\n" +
				"Day 256 detected.\nDecoding message...\n" +
				"Collecting spleeter\n" +
				"  Using cached spleeter-2.1.0-py3-none-any.whl.metadata (10 kB)\n" +
				"Collecting ffmpeg-python==0.2.0 (from spleeter)\n" +
				"  Using cached ffmpeg_python-0.2.0-py3-none-any.whl.metadata (1.7 kB)\n" +
				"Collecting httpx<0.17.0,>=0.16.1 (from httpx[http2]<0.17.0,>=0.16.1->spleeter)\n" +
				"  Using cached httpx-0.16.1-py3-none-any.whl.metadata (38 kB)\n" +
				"Collecting librosa==0.8.0 (from spleeter)\n" +
				"  Using cached librosa-0.8.0.tar.gz (183 kB)\n" +
				"  Preparing metadata (setup.py) ... done\n" +
				"Collecting norbert==0.2.1 (from spleeter)\n" +
				"  Using cached norbert-0.2.1-py2.py3-none-any.whl.metadata (3.8 kB)\n" +
				"Collecting numpy<1.19.0,>=1.16.0 (from spleeter)\n" +
				"  Using cached numpy-1.18.5.zip (5.4 MB)\n" +
				"  Installing build dependencies ... done\n";
			await delay(1000);
			output.textContent = "Collecting spleeter\n" +
				"  Using cached spleeter-2.1.0-py3-none-any.whl.metadata (10 kB)\n" +
				"Collecting ffmpeg-python==0.2.0 (from spleeter)\n" +
				"  Using cached ffmpeg_python-0.2.0-py3-none-any.whl.metadata (1.7 kB)\n" +
				"Collecting httpx<0.17.0,>=0.16.1 (from httpx[http2]<0.17.0,>=0.16.1->spleeter)\n" +
				"  Using cached httpx-0.16.1-py3-none-any.whl.metadata (38 kB)\n" +
				"Collecting librosa==0.8.0 (from spleeter)\n" +
				"  Using cached librosa-0.8.0.tar.gz (183 kB)\n" +
				"  Preparing metadata (setup.py) ... done\n" +
				"Collecting norbert==0.2.1 (from spleeter)\n" +
				"  Using cached norbert-0.2.1-py2.py3-none-any.whl.metadata (3.8 kB)\n" +
				"Collecting numpy<1.19.0,>=1.16.0 (from spleeter)\n" +
				"  Using cached numpy-1.18.5.zip (5.4 MB)\n" +
				"  Installing build dependencies ... done\n" +
				"  Getting requirements to build wheel ... done\n" +
				"  Preparing metadata (pyproject.toml) ... error\n" +
				"  error: subprocess-exited-with-error\n" +
				"  \n" +
				"  × Preparing metadata (pyproject.toml) did not run successfully.\n";
			await delay(800);
			output.textContent = " Initiating startup sequence .\n";
			await delay(800);
			output.textContent = " Initiating startup sequence ..\n";
			await delay(800);
			output.textContent = " Initiating startup sequence ...\n";
			await delay(800);
			output.textContent = " Initiating startup sequence .\n";
			await delay(800);
			output.textContent = " Initiating startup sequence ..\n";
			await delay(800);
			output.textContent = " Initiating startup sequence ...\n";
			await delay(2000);
			output.textContent += "  │ exit code: 1\n" +
				"  ╰─> [26 lines of output]\n" +
				"      Running from numpy source directory.\n" +
				"      <string>:461: UserWarning: Unrecognized setuptools command, proceeding with generating Cython sources and expanding templates\n" +
				"      Traceback (most recent call last):\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 353, in <module>\n" +
				"          main()\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 335, in main\n" +
				"          json_out['return_val'] = hook(**hook_input['kwargs'])\n" +
				"                                   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 149, in prepare_metadata_for_build_wheel\n" +
				"          return hook(metadata_directory, config_settings)\n" +
				"                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n";
			await delay(900);
			output.textContent = "  │ exit code: 1\n" +
				"  ╰─> [26 lines of output]\n" +
				"      Running from numpy source directory.\n" +
				"      <string>:461: UserWarning: Unrecognized setuptools command, proceeding with generating Cython sources and expanding templates\n" +
				"      Traceback (most recent call last):\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 353, in <module>\n" +
				"          main()\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 335, in main\n" +
				"          json_out['return_val'] = hook(**hook_input['kwargs'])\n" +
				"                                   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 149, in prepare_metadata_for_build_wheel\n" +
				"          return hook(metadata_directory, config_settings)\n" +
				"                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 373, in prepare_metadata_for_build_wheel\n";
			await delay(900);
			output.textContent =
				"  ╰─> [26 lines of output]\n" +
				"      Running from numpy source directory.\n" +
				"      <string>:461: UserWarning: Unrecognized setuptools command, proceeding with generating Cython sources and expanding templates\n" +
				"      Traceback (most recent call last):\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 353, in <module>\n" +
				"          main()\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 335, in main\n" +
				"          json_out['return_val'] = hook(**hook_input['kwargs'])\n" +
				"                                   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 149, in prepare_metadata_for_build_wheel\n" +
				"          return hook(metadata_directory, config_settings)\n" +
				"                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 373, in prepare_metadata_for_build_wheel\n" +
				"          self.run_setup()\n";
			await delay(900);
			output.textContent =
				"      Running from numpy source directory.\n" +
				"      <string>:461: UserWarning: Unrecognized setuptools command, proceeding with generating Cython sources and expanding templates\n" +
				"      Traceback (most recent call last):\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 353, in <module>\n" +
				"          main()\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 335, in main\n" +
				"          json_out['return_val'] = hook(**hook_input['kwargs'])\n" +
				"                                   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/home/drakoz/miniconda3/lib/python3.12/site-packages/pip/_vendor/pyproject_hooks/_in_process/_in_process.py\", line 149, in prepare_metadata_for_build_wheel\n" +
				"          return hook(metadata_directory, config_settings)\n" +
				"                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 373, in prepare_metadata_for_build_wheel\n" +
				"          self.run_setup()\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 503, in run_setup\n";
			await delay(1000);
			output.textContent = "Loading dependencies.\n";
			await delay(800);
			output.textContent = "Loading dependencies..\n";
			await delay(800);
			output.textContent = "Loading dependencies...\n";
			await delay(800);
			output.textContent = "Loading dependencies.\n";
			await delay(800);
			output.textContent = "Loading dependencies..\n";
			await delay(800);
			output.textContent = "Loading dependencies...\n";
			await delay(1000);
			output.textContent += "Reading package list... Done \n" +
				"Creating dependency tree... Done\n" +
				"Reading status information... Done\n" +
				"All packages are up to date.";
			await delay(2000);
			output.textContent = "System ready. \n" +
				"Generating video and audio.\n";
			await delay(800);
			output.textContent = "System ready. \n" +
				"Generating video and audio..\n";
			await delay(800);
			output.textContent = "System ready. \n" +
				"Generating video and audio...\n";
			await delay(800);
			output.textContent = "System ready. \n" +
				"Generating video and audio.\n";
			await delay(800);
			output.textContent = "System ready. \n" +
				"Generating video and audio..\n";
			await delay(800);
			output.textContent = "System ready. \n" +
				"Generating video and audio...\n";
			await delay(800);
			output.textContent +=
				"          super().run_setup(setup_script=setup_script)\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 318, in run_setup\n" +
				"          exec(code, locals())\n" +
				"        File \"<string>\", line 488, in <module>\n" +
				"        File \"<string>\", line 465, in setup_package\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/core.py\", line 26, in <module>\n" +
				"          from numpy.distutils.command import config, config_compiler, \\\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/command/config.py\", line 20, in <module>\n" +
				"          from numpy.distutils.mingw32ccompiler import generate_manifest\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/mingw32ccompiler.py\", line 34, in <module>\n" +
				"          from distutils.msvccompiler import get_build_version as get_build_msvc_version\n" +
				"      ModuleNotFoundError: No module named 'distutils.msvccompiler'\n" +
				"      [end of output]\n" +
				"  \n" +
				"  note: This error originates from a subprocess, and is likely not a problem with pip.\n" +
				"error: metadata-generation-failed\n";
			await delay(800);
			output.textContent =
				"          super().run_setup(setup_script=setup_script)\n" +
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 318, in run_setup\n" +
				"          exec(code, locals())\n" +
				"        File \"<string>\", line 488, in <module>\n" +
				"        File \"<string>\", line 465, in setup_package\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/core.py\", line 26, in <module>\n" +
				"          from numpy.distutils.command import config, config_compiler, \\\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/command/config.py\", line 20, in <module>\n" +
				"          from numpy.distutils.mingw32ccompiler import generate_manifest\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/mingw32ccompiler.py\", line 34, in <module>\n" +
				"          from distutils.msvccompiler import get_build_version as get_build_msvc_version\n" +
				"      ModuleNotFoundError: No module named 'distutils.msvccompiler'\n" +
				"      [end of output]\n" +
				"  \n" +
				"  note: This error originates from a subprocess, and is likely not a problem with pip.\n" +
				"error: metadata-generation-failed\n" +
				"\n" +
				"× Encountered error while generating package metadata.\n";
			await delay(800);
			output.textContent =
				"        File \"/tmp/pip-build-env-igojiimh/overlay/lib/python3.12/site-packages/setuptools/build_meta.py\", line 318, in run_setup\n" +
				"          exec(code, locals())\n" +
				"        File \"<string>\", line 488, in <module>\n" +
				"        File \"<string>\", line 465, in setup_package\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/core.py\", line 26, in <module>\n" +
				"          from numpy.distutils.command import config, config_compiler, \\\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/command/config.py\", line 20, in <module>\n" +
				"          from numpy.distutils.mingw32ccompiler import generate_manifest\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/mingw32ccompiler.py\", line 34, in <module>\n" +
				"          from distutils.msvccompiler import get_build_version as get_build_msvc_version\n" +
				"      ModuleNotFoundError: No module named 'distutils.msvccompiler'\n" +
				"      [end of output]\n" +
				"  \n" +
				"  note: This error originates from a subprocess, and is likely not a problem with pip.\n" +
				"error: metadata-generation-failed\n" +
				"\n" +
				"× Encountered error while generating package metadata.\n"+
				"╰─> See above for output.\n";
			await delay(800);
			output.textContent =
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/command/config.py\", line 20, in <module>\n" +
				"          from numpy.distutils.mingw32ccompiler import generate_manifest\n" +
				"        File \"/tmp/pip-install-2y9oe9fz/numpy_ca6c2f3e5f3e4aa6afa6aad746ac2c50/numpy/distutils/mingw32ccompiler.py\", line 34, in <module>\n" +
				"          from distutils.msvccompiler import get_build_version as get_build_msvc_version\n" +
				"      ModuleNotFoundError: No module named 'distutils.msvccompiler'\n" +
				"      [end of output]\n" +
				"  \n" +
				"  note: This error originates from a subprocess, and is likely not a problem with pip.\n" +
				"error: metadata-generation-failed\n" +
				"\n" +
				"× Encountered error while generating package metadata.\n"+
				"╰─> See above for output.\n"+
				"\n" +
				"note: This is an issue with the package mentioned above, not pip.\n" +
				"hint: See above for details.\n" +
				"\n" +
				"[notice] A new release of pip is available: 24.1.1 -> 24.2\n" +
				"[notice] To update, run: pip install --upgrade pip \n";
			await delay(2000);
			output.textContent = '';
			videoWindow.classList.remove('hidden');
			programmerVideo.play();
		} else {
			output.textContent += "ERROR: System failure detected.\n";
			await delay(2000);
			output.textContent += `
       _______  _______  _______  _______
      (  ____ )(  ___  )(       )(  ____ \\
      | (    )|| (   ) || () () || (    \/
      | (____)|| |   | || || || || (__
      |  _____)| |   | || |(_)| ||  __)
      | (      | |   | || |   | || (
      | )      | (___) || )   ( || (____/\\
      |/       (_______)|/     \\|(_______/
      `;
		}
	}
	
	showStartupSequence();
});
