# Mike Schinkel's Resume and Build scripts


My pdf permalink is https://hire.mikeschinkel.com

My `.docx` is at https://hire.mikeschinkel.com/resume.docx

## Repo Architecture

- `resume.fodt` is my resume's source file. 

- `.odt` is an open standard document format. It is functionally equivalent to the Microsoft Office Word document format. The difference is `.odt` does not impose upon the reader the requirement to purchase proprietary software available only on certain platforms. `.odt` is designed for compatibility. 

- `.fodt` is a variation on the `.odt` format that is not zip-compressed, making it more suitable for storage in a version control system like Git.

- Generating [hybrid PDFs](https://wiki.documentfoundation.org/Faq/Writer/PDF_Hybrid) is necessary for the build process.


## Prerequisites/Setup
1. Export a pdf manually with LibreOffice. When doing so, select _"Hybrid PDF"._ This configuration is then stored in your user preferences and used subsequently in this build process.

2. Configure web server ssh credentials in `~/.ssh/config`
```
Host blog
	User <username>
	HostName mikeschinkel.com
```
3. Set up passwordless login to web server with
```
ssh-copy-id blog
```

## Acknowledgements

Huge thanks for [Eric Riese](https://github.com/er2) for [inspiring me](https://www.codementor.io/@ericriese/how-i-maintain-my-resume-and-why-2ac7ensiqk) to manage my resume on Github, [too](https://github.com/er2/resume).